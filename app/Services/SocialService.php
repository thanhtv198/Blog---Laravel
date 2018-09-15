<?php

namespace App\Services;

use App\Contracts\Services\SocialInterface;
use App\Contracts\Repositories\UserRepository;
use App\Models\User;
use Sentinel;
use Socialite;
use Auth;

class SocialService implements SocialInterface
{
    public function createOrGetUser($social)
    {
        $authUser = Socialite::driver($social)->user();

        $user = User::updateOrCreate(
            [
                'email' => $authUser->email,
            ],
            [
                'provider_id' => $authUser->id,
                'name' => $authUser->name,
                'status' => 0,
                'role' => 1,
            ]
        );

        return $user;
    }
}