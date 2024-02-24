<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ['username', 'email' ,'image1','mycourse_id','link_project','description','status'];
    protected $casts = [
        'image1'=>'array', ];
    public function mycourse () {
        return $this->belongsTo('App\Models\MyCourse');
     }

     public function course(){
        return $this->hasManyThrough('App\Models\MyCourse','App\Models\Course');
    }

    
}
