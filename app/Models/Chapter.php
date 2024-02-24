<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['name','course_id'];




    public function course () {
        return $this->belongsTo('App\Models\Course');
     }

     public function lesson (){
        return $this->hasMany('App\Models\Lesson');
     }
}
