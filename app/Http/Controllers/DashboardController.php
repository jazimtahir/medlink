<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = auth()->user()->roles->pluck('name')[0];
        $this->$role();
    }
    public function admin()
    {
        return view('admin/dashboard');
    }
    public function doctor()
    {
        return view('doctor/dashboard');
    }
    public function patient()
    {
        return view('patient/dashboard');
    }
}
