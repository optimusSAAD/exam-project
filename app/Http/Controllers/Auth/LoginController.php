<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo;
    protected function redirectTo( ) {
        if (Auth::check() && Auth::user()->role_id == 1) {
            return $this->redirectTo = 'admin/dashboard';
        }
        elseif (Auth::check() && Auth::user()->role_id == 2) {
            if (Session::get('service_login')){
                return $this->redirectTo = Session::get('service_login');
            }else{
                return $this->redirectTo = 'caregivers/dashboard';
            }
        }
        elseif (Auth::check() && Auth::user()->role_id == 3) {
            if (Session::get('service_login')){
                return $this->redirectTo = Session::get('service_login');
            }else{
                return $this->redirectTo = '/dashboard';
            }
        }
        else {
            return('/login');
        }
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
