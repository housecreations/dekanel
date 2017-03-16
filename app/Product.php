<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = "products";

    protected $fillable = [
        'image_url', 'name', 'description', 'consultant_image_url'
    ];

    public function topics(){

        return $this->hasMany('App\Topic');

    }

    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'LIKE', "%$name%");
    }

}
