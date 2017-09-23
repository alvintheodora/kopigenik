<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //added, overwrite the ones in AuthenticatesUsers
    public function showLoginForm()
    {
        if(! session()->has('from')){
            session()->flash('from', url()->previous());
        }

        return view('auth.login');
        //BUG: should be redirect, instead of view. view will make flash persists for 2 requests.
    }
    public function authenticated($request, $user)
    {
        return redirect(session('from',$this->redirectTo));
    }
}
