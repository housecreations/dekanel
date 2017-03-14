<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTopic extends Model
{
    protected $table = "sub_topics";

    protected $fillable = [
        'topic_id', 'name'
    ];

    public function topic(){
        return $this->belongsTo('App\Topic');
    }

}
