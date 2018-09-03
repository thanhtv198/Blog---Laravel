<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Services\SocialInterface;
use App\Services\SocialService;
use Sentinel;
use Socialite;
use Auth;
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
     * @param $social
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($social, SocialService $service)
    {
        try {
            $user = $service->createOrGetUser($social);

            Auth::login($user, true);

            return redirect()->route('admin.home');
        } catch (\Exception $e) {
            return redirect('admin/login');
        }

    }
}

