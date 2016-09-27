<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        'name', 'description',
    ];

    protected $hidden = [

    ];

    public static function fillableFields() {
        $project = new Project();
        return $project->fillable;
    }
}
