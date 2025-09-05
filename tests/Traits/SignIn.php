<?php

namespace Tests\Traits;

use App\Models\User\User;
use App\Services\User\AcceptPolicy;
use Illuminate\Contracts\Auth\Authenticatable;

trait SignIn
{
    /**
     * Create a user and sign in as that user. If a user
     * object is passed, then sign in as that user.
     */
    public function signIn(?Authenticatable $user = null): mixed
    {
        if (is_null($user)) {
            $user = factory(User::class)->create();
            $user->account->populateDefaultFields();
            app(AcceptPolicy::class)->execute([
                'account_id' => $user->account_id,
                'user_id' => $user->id,
                'ip_address' => null,
            ]);
        }

        $this->be($user);

        return $user;
    }
}
