<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    protected $table = "consultants";

    protected $fillable = [
        'name', 'last_name', 'description', 'speciality', 'profile_image_url'
    ];

}
