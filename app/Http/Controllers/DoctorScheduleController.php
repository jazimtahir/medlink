<?php

namespace App\Http\Controllers;

use App\Models\DoctorSchedule;
use App\Models\DoctorScheduleTime;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function index() {
        $doctor = auth()->user()->doctor;
        $gap_time = '';
        $session_time = '';

        if(count($doctor->schedule)) {
            $gap_time = $doctor->schedule[0]->gap_time;
            $session_time = $doctor->schedule[0]->session_time;
        }
        return view('doctor.schedule.index')
            ->with('schedule',$doctor->schedule)
            ->with('gap_time', $gap_time)
            ->with('session_time', $session_time);
    }

    public function store(Request $request) {
        $request->validate([
            'session_time' => 'required',
            'gap_time' => 'required',
        ]);

        for($i = 1; $i <= 7; $i++) {
            if($i = 1){
                $schedule = DoctorSchedule::updateOrCreate(
                    [
                        'doctor_id' => auth()->user()->doctor->id,
                        'day' => $i,
                    ],
                    [
                        'gap_time' => $request->gap_time,
                        'session_time' => $request->session_time,
                        'status' => ($request->mon == 'on') ? 1 : 0,
                    ]
                );
                $starts = $request->monStart;
                $ends = $request->monEnd;
                if(isset(auth()->user()->doctor->schedule[0]) && count($starts)) {
                    auth()->user()->doctor->schedule[0]->times->each->delete();
                }
                for($k = 0; $k <= count($starts); $k++) {
                    if(!isset($starts[$k])) {
                        continue;
                    }
                    $start = date("H:i:s", strtotime($starts[$k]));
                    $end = date("H:i:s", strtotime($ends[$k]));
                    if($end < $start){
                        return redirect()->back()->withErrors(['message' => 'Start Time cannot be greater than End Time']);
                    }
                    DoctorScheduleTime::create(
                        [
                            'doctor_schedule_id' => $schedule->id,
                            'start_time' => $start,
                            'end_time' => $end
                        ]
                    );
                }
            }
            if($i = 2){
                $schedule = DoctorSchedule::updateOrCreate(
                    [
                        'doctor_id' => auth()->user()->doctor->id,
                        'day' => $i,
                    ],
                    [
                        'gap_time' => $request->gap_time,
                        'session_time' => $request->session_time,
                        'status' => ($request->tue == 'on') ? 1 : 0,
                    ]
                );
                $starts = $request->tueStart;
                $ends = $request->tueEnd;
                if(isset(auth()->user()->doctor->schedule[1]) && count($starts)) {
                    auth()->user()->doctor->schedule[1]->times->each->delete();
                }
                for($k = 0; $k <= count($starts); $k++) {
                    if(!isset($starts[$k])) {
                        continue;
                    }
                    $start = date("H:i:s", strtotime($starts[$k]));
                    $end = date("H:i:s", strtotime($ends[$k]));
                    if($end < $start){
                        return redirect()->back()->withErrors(['message' => 'Start Time cannot be greater than End Time']);
                    }
                    DoctorScheduleTime::create(
                        [
                            'doctor_schedule_id' => $schedule->id,
                            'start_time' => $start,
                            'end_time' => $end
                        ]
                    );
                }
            }
            if($i = 3){
                $schedule = DoctorSchedule::updateOrCreate(
                    [
                        'doctor_id' => auth()->user()->doctor->id,
                        'day' => $i,
                    ],
                    [
                        'gap_time' => $request->gap_time,
                        'session_time' => $request->session_time,
                        'status' => ($request->wed == 'on') ? 1 : 0,
                    ]
                );
                $starts = $request->wedStart;
                $ends = $request->wedEnd;
                if(isset(auth()->user()->doctor->schedule[2]) && count($starts)) {
                    auth()->user()->doctor->schedule[2]->times->each->delete();
                }
                for($k = 0; $k <= count($starts); $k++) {
                    if(!isset($starts[$k])) {
                        continue;
                    }
                    $start = date("H:i:s", strtotime($starts[$k]));
                    $end = date("H:i:s", strtotime($ends[$k]));
                    if($end < $start){
                        return redirect()->back()->withErrors(['message' => 'Start Time cannot be greater than End Time']);
                    }
                    DoctorScheduleTime::create(
                        [
                            'doctor_schedule_id' => $schedule->id,
                            'start_time' => $start,
                            'end_time' => $end
                        ]
                    );
                }
            }
            if($i = 4){
                $schedule = DoctorSchedule::updateOrCreate(
                    [
                        'doctor_id' => auth()->user()->doctor->id,
                        'day' => $i,
                    ],
                    [
                        'gap_time' => $request->gap_time,
                        'session_time' => $request->session_time,
                        'status' => ($request->thu == 'on') ? 1 : 0,
                    ]
                );
                $starts = $request->thuStart;
                $ends = $request->thuEnd;
                if(isset(auth()->user()->doctor->schedule[3]) && count($starts)) {
                    auth()->user()->doctor->schedule[3]->times->each->delete();
                }
                for($k = 0; $k <= count($starts); $k++) {
                    if(!isset($starts[$k])) {
                        continue;
                    }
                    $start = date("H:i:s", strtotime($starts[$k]));
                    $end = date("H:i:s", strtotime($ends[$k]));
                    if($end < $start){
                        return redirect()->back()->withErrors(['message' => 'Start Time cannot be greater than End Time']);
                    }
                    DoctorScheduleTime::create(
                        [
                            'doctor_schedule_id' => $schedule->id,
                            'start_time' => $start,
                            'end_time' => $end
                        ]
                    );
                }
            }
            if($i = 5){
                $schedule = DoctorSchedule::updateOrCreate(
                    [
                        'doctor_id' => auth()->user()->doctor->id,
                        'day' => $i,
                    ],
                    [
                        'gap_time' => $request->gap_time,
                        'session_time' => $request->session_time,
                        'status' => ($request->fri == 'on') ? 1 : 0,
                    ]
                );
                $starts = $request->friStart;
                $ends = $request->friEnd;
                if(isset(auth()->user()->doctor->schedule[4]) && count($starts)) {
                    auth()->user()->doctor->schedule[4]->times->each->delete();
                }
                for($k = 0; $k <= count($starts); $k++) {
                    if(!isset($starts[$k])) {
                        continue;
                    }
                    $start = date("H:i:s", strtotime($starts[$k]));
                    $end = date("H:i:s", strtotime($ends[$k]));
                    if($end < $start){
                        return redirect()->back()->withErrors(['message' => 'Start Time cannot be greater than End Time']);
                    }
                    DoctorScheduleTime::create(
                        [
                            'doctor_schedule_id' => $schedule->id,
                            'start_time' => $start,
                            'end_time' => $end
                        ]
                    );
                }
            }
            if($i = 6){
                $schedule = DoctorSchedule::updateOrCreate(
                    [
                        'doctor_id' => auth()->user()->doctor->id,
                        'day' => $i,
                    ],
                    [
                        'gap_time' => $request->gap_time,
                        'session_time' => $request->session_time,
                        'status' => ($request->sat == 'on') ? 1 : 0,
                    ]
                );
                $starts = $request->satStart;
                $ends = $request->satEnd;
                if(isset(auth()->user()->doctor->schedule[5]) && count($starts)) {
                    auth()->user()->doctor->schedule[5]->times->each->delete();
                }
                for($k = 0; $k <= count($starts); $k++) {
                    if(!isset($starts[$k])) {
                        continue;
                    }
                    $start = date("H:i:s", strtotime($starts[$k]));
                    $end = date("H:i:s", strtotime($ends[$k]));
                    if($end < $start){
                        return redirect()->back()->withErrors(['message' => 'Start Time cannot be greater than End Time']);
                    }
                    DoctorScheduleTime::create(
                        [
                            'doctor_schedule_id' => $schedule->id,
                            'start_time' => $start,
                            'end_time' => $end
                        ]
                    );
                }
            }
            if($i = 7){
                $schedule = DoctorSchedule::updateOrCreate(
                    [
                        'doctor_id' => auth()->user()->doctor->id,
                        'day' => $i,
                    ],
                    [
                        'gap_time' => $request->gap_time,
                        'session_time' => $request->session_time,
                        'status' => ($request->sun == 'on') ? 1 : 0,
                    ]
                );
                $starts = $request->sunStart;
                $ends = $request->sunEnd;
                if(isset(auth()->user()->doctor->schedule[6]) && count($starts)) {
                    auth()->user()->doctor->schedule[6]->times->each->delete();
                }
                for($k = 0; $k < count($starts); $k++) {
                    if(!isset($starts[$k])) {
                        continue;
                    }
                    $start = date("H:i:s", strtotime($starts[$k]));
                    $end = date("H:i:s", strtotime($ends[$k]));
                    if($end <= $start){
                        return redirect()->back()->withErrors(['message' => 'Start Time cannot be greater than End Time']);
                    }
                    DoctorScheduleTime::create(
                        [
                            'doctor_schedule_id' => $schedule->id,
                            'start_time' => $start,
                            'end_time' => $end
                        ]
                    );
                }
            }
        }
        return back();
    }
}
