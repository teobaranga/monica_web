<?php

namespace Tests\Unit\Jobs;

use App\Jobs\Avatars\CreateAvatarsForExistingContacts;
use App\Jobs\Avatars\GenerateDefaultAvatar;
use App\Jobs\Avatars\GetAvatarsFromInternet;
use App\Models\Contact\Contact;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Queue;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CreateAvatarsForExistingContactsTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    public function it_creates_jobs_for_avatars_migration()
    {
        Queue::fake();

        $contact = factory(Contact::class)->create([
            'avatar_default_url' => '',
        ]);

        (new CreateAvatarsForExistingContacts)->handle();

        Queue::assertPushed(GenerateDefaultAvatar::class, function ($job) use ($contact) {
            return $job->contact->id === $contact->id;
        });
        Queue::assertPushed(GetAvatarsFromInternet::class, function ($job) use ($contact) {
            return $job->contact->id === $contact->id;
        });
    }
}
