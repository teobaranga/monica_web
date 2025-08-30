<?php

namespace App\Services\Contact\Avatar;

use App\Models\Contact\Contact;
use App\Services\BaseService;

class GetAvatarsFromInternet extends BaseService
{
    /**
     * Get the validation rules that apply to the service.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'contact_id' => 'required|integer|exists:contacts,id',
        ];
    }

    /**
     * Query Gravatar based on the email address of the contact.
     *
     * - Gravatar only gives an avatar only if it's set.
     *
     * @param array $data
     * @return Contact
     */
    public function execute(array $data): Contact
    {
        $this->validate($data);

        $contact = Contact::findOrFail($data['contact_id']);

        $contact = $this->getGravatar($contact);

        return $contact;
    }

    /**
     * Query Gravatar (if it exists) for the contact's email address.
     *
     * @param Contact $contact
     * @return Contact
     */
    private function getGravatar(Contact $contact): Contact
    {
        return app(GetGravatar::class)->execute([
            'contact_id' => $contact->id,
        ]);
    }
}
