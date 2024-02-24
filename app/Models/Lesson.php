<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Lesson extends Model
{
    protected $fillable = ['name','url_video','time','chapter_id'];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function chapter(){
        return $this->belongsTo('App\Models\Chapter');
    }

    public function course(){
        return $this->hasManyThrough('App\Models\Chapter','App\Models\Course');
    }
    
}
