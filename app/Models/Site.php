<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = ['site_name','email','phone','address','header_title','header_description','header_image','about_title','about_description','about_image'];
}
