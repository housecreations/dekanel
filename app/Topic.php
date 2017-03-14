<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = "topics";

    protected $fillable = [
        'image_url', 'name'
    ];

    public function product(){

        return $this->belongsTo('App\Product');

    }

    public function subTopics(){

        return $this->hasMany('App\SubTopic');

    }
}
