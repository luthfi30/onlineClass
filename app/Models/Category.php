<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug' ,'thumbnail'];

    public function category() {
        return $this->hasMany('App\Models\Course');
     }

     
}
