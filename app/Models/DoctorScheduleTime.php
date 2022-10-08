<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorScheduleTime extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function schedule() {
        return $this->belongsTo(DoctorSchedule::class);
    }

    public function start12() {
        return date("g:i A", strtotime($this->start_time));
    }

    public function end12() {
        return date("g:i A", strtotime($this->end_time));
    }
}
