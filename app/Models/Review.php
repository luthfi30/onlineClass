<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id','mycourse_id','description','rating'];

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function mycourse()
    {
        return $this->belongsTo(MyCourse::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
