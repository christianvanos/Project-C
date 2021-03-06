<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprintMeetings extends Model
{
    protected $table = "sprint_meetings";

    public function sprint()
    {
        return $this->belongsTo('App\Sprints', 'sprint_id');
    }

    public function present()
    {
        return $this->hasMany('App\SprintMeetingPresents', 'meeting_id');
    }
}
