<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
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

    public function doctors() {
        $doctors = User::role('doctor')->where('is_active', 1)->get();
        return view('patient.appointment.doctors')
            ->with('doctors', $doctors);
    }

    public function schedule($id) {
        $doctor = Doctor::find($id);
        $availableSlots = [];
        foreach($doctor->schedule as $key=>$schedule) {
            if($schedule->status != 1) {
                continue;
            }
            if($schedule->times()->count()) {
                $availableSlots[$key]['day'] = $schedule->dayName();
            }
            foreach($schedule->times as $k=>$time) {
                $StartTime    = strtotime($time->start_time); //Get Timestamp
                $EndTime      = strtotime($time->end_time); //Get Timestamp

                $sessionMins  = $schedule->session_time * 60;
                $gapMins  = $schedule->gap_time * 60;

                while ($StartTime <= $EndTime) //Run loop
                {
                    $nextPossible = $StartTime + $sessionMins;
                    if($EndTime >= $nextPossible) {
                        $availableSlots[$key]['timeslots'][] = date ("g:i A", $StartTime) . ' - ' . date ("g:i A", ($StartTime += $sessionMins));
                    }
                    $StartTime += $gapMins;
                }
            }
        }
        return view('patient.appointment.schedule')
            ->with('doctor', $doctor)
            ->with('availableSlots', $availableSlots);
    }

    public function confirmSchedule($id, Request $request) {
        $time = explode (" - ", $request->timeslot);
        $start_time = date("H:i:s", strtotime($time[0]));
        $end_time = date("H:i:s", strtotime($time[1]));
        $day = match ($request->day) {
            'Monday' => 1,
            'Tuesday' => 2,
            'Wednesday' => 3,
            'Thursday' => 4,
            'Friday' => 5,
            'Saturday' => 6,
            'Sunday' => 7,
            default => 0,
        };
        $appointment = Appointment::create([
            'doctor_id' => $id,
            'patient_id' => auth()->user()->patient->id,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'day' => $day,
            'reason' => $request->reason,
            'status' => 'BOOKED',
            'paid' => 0,
        ]);
        session()->flash('message', 'Appointment Scheduled Successful!');
        return redirect()->route('patient.appointment');
    }

    public function done(Request $request) {
        $appointment = Appointment::find($request->appointment);
        $appointment->status = 'DONE';
        $appointment->paid = 1;
        if(isset($request->doctor_comment) && $request->doctor_comment) {
            $appointment->doctor_comment = $request->doctor_comment;
        }
        $appointment->save();
        return back()->with('message', 'Appointment Marked as Done, Successful!');
    }

    public function cancel(Request $request) {
        $appointment = Appointment::find($request->appointment);
        $appointment->status = 'CANCELED';
        $appointment->canceled_by = (auth()->user()->roles->pluck('name')[0] == 'doctor') ? 'doctor' : 'patient';
        if(isset($request->reason) && $request->reason) {
            $appointment->reason = $request->reason;
        }
        $appointment->save();
        return back()->with('message', 'Appointment Canceled!');
    }
}
