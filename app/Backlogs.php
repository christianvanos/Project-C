<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backlogs extends Model
{
    protected $table = "backlogs";

    public function sprint()
    {
        return $this->belongsTo('App\Sprints', 'sprints_id');
    }

    public function items()
    {
        return $this->hasMany('App\UserstoryItems', 'backlog_id');
    }
}
