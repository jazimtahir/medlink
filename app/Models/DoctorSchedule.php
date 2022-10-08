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
}
