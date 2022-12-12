<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function to_user() {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    public function from_user() {
        return $this->belongsTo(User::class, 'from_user_id');
    }
}
