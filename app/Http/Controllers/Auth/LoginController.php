<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    protected function attemptLogin(Request $request)
{
    $credentials = $this->credentials($request);

    if ($this->guard()->attempt($credentials, $request->filled('remember'))) {

        Session::put('COIN', "");
        Session::put('EXP', "");
        session::put('playingteams', []);

        return true;
    }

    return false;
}


    // protected function authenticated(Request $request, $user)
    // {
    //     if ($user->hasRole('lo')) {
    //         return redirect('/pos');
    //     } elseif ($user->hasRole('player')) {
    //         return redirect('/play');
    //     }

    //     // Default redirect for other roles
    //     return redirect('/home');
    // }

}
