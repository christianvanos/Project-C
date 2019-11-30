<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprints extends Model
{
    protected $table = "sprints";

    public function project()
    {
        return $this->belongsTo('App\Projects', 'project_id');
    }

    public function backlogs()
    {
        return $this->hasMany('App\Backlogs', 'sprint_id');
    }

    public function dailyscrums()
    {
        return $this->hasMany('App\DailyScrums', 'sprint_id');
    }

    public function meetings()
    {
        return $this->hasMany('App\SprintMeetings', 'sprint_id');
    }

}
