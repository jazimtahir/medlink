<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:13', 'unique:users'],
            'gender' => ['required', 'in:M,F,T'],
            'dob' => 'required|date_format:Y-m-d|before:today',
            'role' => ['required', 'string', 'in:doctor,patient'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'is_active' => 1,
            'is_verified' => 1,
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole(Role::findByName($data['role']));
        switch ($data['role']) {
            case 'doctor':
                Doctor::create(['user_id' => $user->id]);
                break;
            case 'patient':
                Patient::create(['user_id' => $user->id]);
                break;
        }
        return $user;
    }
}
