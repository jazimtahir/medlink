<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function specialization() {
        return $this->belongsTo(Specialization::class);
    }

    public function schedule() {
        return $this->hasMany(DoctorSchedule::class);
    }

    public function appointments() {
        return $this->hasMany(Appointment::class)->latest();
    }

    public function activeAppointments() {
        return $this->appointments()->where('status', 'BOOKED');
    }

    public function todayCreatedAppointments() {
        return $this->appointments()->whereDate('created_at', Carbon::today())->get();
    }

    public function getTodayAppointments() {
        $day = date('N', strtotime(now()));
        return $this->appointments()->where('day',$day)->get();
    }

    public function canceledAppointments() {
//        return $this->appointments()->where('status', 'CANCELED')->where('canceled_by', 'doctor');
        return $this->appointments()->where('status', 'CANCELED');
    }

    public function doneAppointments() {
        return $this->appointments()->where('status', 'DONE');
    }

    public function getActiveAppointmentsByDay($day) {
        return $this->appointments()
            ->where('day',$day)
            ->where('status', 'BOOKED')
            ->get();
    }
}
