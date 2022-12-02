<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    public function start12() {
        return date("g:i A", strtotime($this->start_time));
    }

    public function end12() {
        return date("g:i A", strtotime($this->end_time));
    }
}
