<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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

    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {

        if (auth()->user()->level == 0) {
            $this->redirectTo = '/operator';
            return $this->redirectTo;
        }else if (auth()->user()->level == 1) {
            $this->redirectTo = '/dosen';
            return $this->redirectTo;
        }else if (auth()->user()->level == 2) {
            $this->redirectTo = '/mahasiswa';
            return $this->redirectTo;
        }else{
            $this->redirectTo = '/login';
            return $this->redirectTo;
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