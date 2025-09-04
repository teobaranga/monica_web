<?php

namespace Feature;

use App\Models\Contact\Contact;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Attributes\Test;
use Tests\FeatureTestCase;

class GiftControllerTest extends FeatureTestCase
{
    use DatabaseTransactions;

    #[Test]
    function store_gift()
    {
        $this->signIn();

        $this->postJson(route('people.store'),
            [
                'first_name' => 'John',
            ]);

        $contact = Contact::where(['first_name' => 'John'])->firstOrFail();
        $this->postJson(route('people.gifts.store', $contact),
            [
                'name' => 'Mug',
                'status' => 'idea',
            ])
            ->assertSuccessful();
    }
}
