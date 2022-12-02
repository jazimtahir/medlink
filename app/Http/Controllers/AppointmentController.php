<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function doctorIndex(){
        return view('doctor.appointment.index')
            ->with('appointments', auth()->user()->doctor->appointments);
    }

    public function patientIndex(){
        return view('patient.appointment.index')
            ->with('appointments', auth()->user()->patient->appointments);
    }

    public function create(Request $request) {

    }

    public function done($id) {
        $appointment = Appointment::find($id);
        $appointment->status = 'DONE';
        $appointment->paid = 1;
        $appointment->save();
        return back()->with('message', 'Appointment Successful!');
    }

    public function cancel($id) {
        $appointment = Appointment::find($id);
        $appointment->status = 'CANCELED';
        $appointment->canceled_by = (auth()->user()->roles->pluck('name')[0] == 'doctor') ? 'doctor' : 'patient';
        $appointment->save();
        return back()->with('message', 'Appointment Canceled!');
    }
}
