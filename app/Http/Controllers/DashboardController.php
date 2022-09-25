<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\User;
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
        switch ($role) {
            case 'admin':
                $totalDoctors = User::role('doctor')->count();
                $activeDoctors = User::role('doctor')->where('is_active', 1)->count();
                $totalPatients = User::role('patient')->count();
                $activePatients = User::role('patient')->where('is_active', 1)->count();
                return view('dashboard')
                    ->with('totalDoctors', $totalDoctors)
                    ->with('activeDoctors', $activeDoctors)
                    ->with('totalPatients', $totalPatients)
                    ->with('activePatients', $activePatients);
                break;
            case 'patient':
            case 'doctor':
                return view('dashboard');
                break;
        }
    }
}
