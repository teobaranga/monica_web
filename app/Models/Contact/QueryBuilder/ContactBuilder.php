<?php

namespace App\Models\Contact\QueryBuilder;

use App\Models\Account\AddressBook;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ContactBuilder extends Builder
{

    /**
     * Scope a query to only include contacts who are not only a kid or a
     * significant other without being a contact.
     */
    public function real(): self
    {
        return $this->where('is_partial', 0);
    }

    /**
     * Get the contacts that have all the provided \$tags
     * or if \$tags is NONE get contacts that have no tags.
     *
     * @param mixed $tags string or Tag
     */
    public function tags($tags): self
    {
        if ($tags == 'NONE') {
            // get tagless contacts
            return $this->doesntHave('tags');
        } elseif (!empty($tags)) {
            // gets users who have all the tags
            $query = $this;
            foreach ($tags as $tag) {
                $query = $query->whereHas('tags', function (\Illuminate\Contracts\Database\Eloquent\Builder $query) use ($tag) {
                    $query->where('id', $tag->id);
                });
            }
            return $this;
        }

        return $this;
    }

    /**
     * Scope a query to only include contacts who are active.
     */
    public function active(): self
    {
        return $this->where('is_active', 1);
    }

    /**
     * Scope a query to only include contacts who are alive.
     */
    public function alive(): self
    {
        return $this->where('is_dead', 0);
    }

    /**
     * Scope a query to only include contacts who are dead.
     */
    public function dead(): self
    {
        return $this->where('is_dead', 1);
    }

    /**
     * Scope a query to only include contacts who are not active.
     */
    public function notActive(): self
    {
        return $this->where('is_active', 0);
    }

    /**
     * Scope a query to include contacts whose notes contain the search phrase.
     */
    public function notes(?int $accountId = null, string $needle): self
    {
        $maccountId = $accountId ?? Auth::user()->account_id;

        return $this->orWhereHas('notes', function ($query) use ($maccountId, $needle) {
            return $query->where([
                ['account_id', $maccountId],
                ['body', 'like', "%$needle%"],
            ]);
        });
    }

    /**
     * Scope a query to include contacts whose introduction notes contain the search phrase.
     */
    public function introductionAdditionalInformation(int|null $accountId = null, string $needle): self
    {
        $maccountId = $accountId ?? Auth::user()->account_id;

        return $this->orWhere([
            ['account_id', $maccountId],
            ['first_met_additional_info', 'like', "%$needle%"],
        ]);
    }

    /**
     * Scope a query to only include contacts from given address book.
     * 'null' value for address book is the default address book.
     */
    public function addressBook(int|null $accountId = null, string|null $addressBookName = null): self
    {
        $addressBook = null;
        if ($accountId && $addressBookName) {
            $addressBook = AddressBook::where([
                'account_id' => $accountId,
                'name' => $addressBookName,
            ])->first();
        }

        return $this->where('address_book_id', $addressBook?->id);
    }

    /**
     * Get contacts ordered by user preferences.
     */
    public function orderByUserPreference(): self
    {
        return match (Auth::user()->name_order) {
            'firstname_lastname' => $this
                ->orderBy('first_name')
                ->orderBy('last_name'),
            'firstname_lastname_nickname' => $this
                ->orderBy('first_name')
                ->orderBy('last_name')
                ->orderBy('nickname'),
            'firstname_nickname_lastname' => $this
                ->orderBy('first_name')
                ->orderBy('nickname')
                ->orderBy('last_name'),
            'nickname' => $this
                ->orderBy('nickname'),
            'lastname_firstname' => $this
                ->orderBy('last_name')
                ->orderby('first_name'),
            'lastname_firstname_nickname' => $this
                ->orderBy('last_name')
                ->orderby('first_name')
                ->orderby('nickname'),
            'lastname_nickname_firstname' => $this
                ->orderBy('last_name')
                ->orderby('nickname')
                ->orderby('first_name'),
            default => $this,
        };
    }

    /**
     * Sort the contacts according a given criteria.
     */
    public function sortedBy(string $criteria): self
    {
        return match ($criteria) {
            'firstnameAZ' => $this->orderBy('first_name'),
            'firstnameZA' => $this->orderByDesc('first_name'),
            'lastnameAZ' => $this->orderBy('last_name'),
            'lastnameZA' => $this->orderByDesc('last_name'),
            'lastactivitydateNewtoOld' => $this->sortedByLastActivity('desc'),
            'lastactivitydateOldtoNew' => $this->sortedByLastActivity('asc'),
            default => $this,
        };
    }

    /**
     * Sort the contacts using last activity.
     */
    private function sortedByLastActivity(string $order): self
    {
        $this->leftJoin('activity_contact', 'contacts.id', '=', 'activity_contact.contact_id');
        $this->leftJoin('activities', 'activity_contact.activity_id', '=', 'activities.id');
        $this->groupBy('contacts.id');
        $this->orderBy('activities.happened_at', $order);
        $this->select(['*', 'contacts.id as id']);

        return $this;
    }
}
