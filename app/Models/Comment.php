<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
     protected $fillable = ['konten','user_id','forum_id','parent'];
     public function user(){
        return $this->belongsTo('App\User');
    }

     public function forum()
    {
        return $this->hasMany('App\Models\Forum');
    }

     public function child()
    {
        return $this->hasMany('App\Models\Comment','parent');
    }
}
