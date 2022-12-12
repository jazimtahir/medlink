<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function times() {
        return $this->hasMany(DoctorScheduleTime::class);
    }

    public function dayName() {
        if($this->day == 1) {
            return 'Monday';
        }
        elseif($this->day == 2){
            return 'Tuesday';
        }
        elseif($this->day == 3){
            return 'Wednesday';
        }
        elseif($this->day == 4){
            return 'Thursday';
        }
        elseif($this->day == 5){
            return 'Friday';
        }
        elseif($this->day == 6){
            return 'Saturday';
        }
        elseif($this->day == 7){
            return 'Sunday';
        }
        else{
            return 'N/A';
        }
    }
}
