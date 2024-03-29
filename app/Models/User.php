<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
//    protected $fillable = [
//        'first_name',
//        'last_name',
//        'username',
//        'email',
//        'phone',
//        'gender',
//        'password',
//    ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function doctor() {
        return $this->hasOne(Doctor::class);
    }

    public function patient() {
        return $this->hasOne(Patient::class);
    }

    public function getImg() {
        return ($this->image) ? asset('storage/images/' . $this->image) : asset('assets/images/default.png');
    }

    public function reviews_to_me(){
        return $this->hasMany(UserReview::class, 'to_user_id');
    }

    public function my_reviews(){
        return $this->hasMany(UserReview::class, 'from_user_id');
    }
}
