<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','price','status','foto'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function mycourse()
    {
        return $this->hasMany('App\Models\MyCourse');
    }
}
