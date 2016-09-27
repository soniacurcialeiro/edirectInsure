<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'description', 'create_date', 'finish_date', 'projectId'
    ];

    protected $hidden = [

    ];

    public static function fillableFields() {
        $task = new Task();
        return $task->fillable;
    }

    public function project()
    {
        return $this->belongsTo(\App\Project::class, 'projectId');
    }

}
