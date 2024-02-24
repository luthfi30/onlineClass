<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    //
     protected $fillable = ['judul','slug','konten','user_id','mycourse_id'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }

     public function mycourse()
    {
        return $this->belongsTo(MyCourse::class);
    }

     public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
