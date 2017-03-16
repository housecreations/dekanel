<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationInformation extends Model
{
    protected $table = "application_informations";

    protected $fillable = [
        'option', 'value', 'label'
    ];

    public function scopeSearch($query, $name)
    {
        return $query->where('label', 'LIKE', "%$name%");
    }
}
