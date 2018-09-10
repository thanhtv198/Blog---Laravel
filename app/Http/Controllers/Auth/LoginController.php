<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequet;
use App\Models\User;
use App\Repositories\UserRepositoryEloquent;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showLoginFormAdmin()
    {
        return view('auth.login_admin');
    }

    public function login(LoginRequet $request, UserRepositoryEloquent $user)
    {
        $data = $request->all();

        if ($user->login($data)) {
            return redirect('/')->with('success', trans('en.login.success'));
        } else {
            return redirect()->back()->with('message', trans('en.login.failed'));
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
