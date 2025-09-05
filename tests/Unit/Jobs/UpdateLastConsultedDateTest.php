<?php

namespace Tests\Unit\Jobs;

use App\Jobs\UpdateLastConsultedDate;
use App\Models\Contact\Contact;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UpdateLastConsultedDateTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    public function it_updates_the_last_consulted_at_field_for_the_given_contact()
    {
        Carbon::setTestNow(Carbon::create(2017, 1, 1, 7));

        $contact = factory(Contact::class)->create([
            'number_of_views' => 1,
        ]);

        UpdateLastConsultedDate::dispatch($contact);

        $this->assertDatabaseHas('contacts', [
            'id' => $contact->id,
            'last_consulted_at' => '2017-01-01 07:00:00',
            'number_of_views' => 2,
        ]);
    }
}
