<?php

namespace App\Http\Controllers\Auth;

use Sentinel;
use Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialLoginController extends Controller
{
    /**
     * Handle Social login request
     * @return response
     */
    public function redirectToProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }

    /**
     * Obtain the user information from Social Logged in.
     * @param $social
     * @return Response
     */
    public function handleProviderCallback($social)
    {
        $user = Socialite::driver($social)->user();

        // $authUser = $this->findOrCreateUser($user, $provider);
        $authUser = User::where('provider_id', $user->id)->first();

        if ($authUser) {
            $loginUser = $authUser;
        } else {
            $loginUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'provider_id' => $user->id
            ]);
        }

        Auth::login($loginUser, true);

        return redirect('/');
    }
}

