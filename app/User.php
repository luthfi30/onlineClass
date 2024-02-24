<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','profession','avatar','role','no_hp','email','password','status','cv'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function order(){
        return $this->hasMany('App\Models\Order');
     }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeMentor($query)
    {
        return $query->where('role', 'mentor');
    }

    public function Course(){
        return $this->hasMany('App\Models\course');
     }

    public function mycourse()
    {
        return $this->hasMany('App\Models\MyCourse');
    }

    public function forum()
    {
        return $this->hasMany('App\Models\Forum');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
