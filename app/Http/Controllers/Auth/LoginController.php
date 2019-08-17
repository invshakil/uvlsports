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
     * Check user's role and redirect user based on their role
     * @return
     */
    public function authenticated()
    {
        if (auth()->user()->role == 1) {
            return redirect('/admin/dashboard');
        }

        return redirect('/account');
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $user = \App\User::where([
            'email' => $request->email,
            'password' => md5($request->password)
        ])->first();

        if ($user) {
            $this->guard()->login($user, $request->has('remember'));
            return true;
        }

        return false;
    }

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
