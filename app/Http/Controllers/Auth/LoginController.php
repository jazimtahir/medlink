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
//    protected $redirectTo = RouteServiceProvider::DASHBOARD;
    public function redirectTo() {
        $role = auth()->user()->roles->pluck('name')[0] ?? '';
        return match ($role) {
            'admin' => RouteServiceProvider::ADMIN_DASHBOARD,
            'doctor' => RouteServiceProvider::DOCTOR_DASHBOARD,
            'patient' => RouteServiceProvider::PATIENT_DASHBOARD,
            default => '/',
        };
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

    public function logout() {
        auth()->logout();
        return redirect('/login');
      }
}
