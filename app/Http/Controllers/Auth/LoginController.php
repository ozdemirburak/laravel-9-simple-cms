<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login', ['hasCaptcha' => $this->hasCaptcha()]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request): void
    {
        $rules = [$this->username() => 'required|string', 'password' => 'required|string'];
        if ($this->hasCaptcha()) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }
        $this->validate($request, $rules);
    }

    /**
     * @return bool
     */
    private function hasCaptcha()
    {
        return !empty(env('GOOGLE_NOCAPTCHA_SITEKEY')) && strpos(env('GOOGLE_NOCAPTCHA_SECRET'), 'google') === false;
    }
}

