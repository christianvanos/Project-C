<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprintMeetings extends Model
{
    protected $table = "sprint_meetings";

    public function sprint()
    {
        return $this->belongsTo('App\Sprints', 'sprints_id');
    }

    public function present()
    {
        return $this->belongsTo('App\SprintMeetingPresents', 'present_id');
    }
}
