<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprintMeetingPresents extends Model
{
    protected $table = "sprint_meeting_presents";

    public function meetings()
    {
        return $this->hasMany('App\SprintMeetings', 'present_id');
    }

    public function member()
    {
        return $this->belongsTo('App\ProjectMembers', 'members_id');
    }
}
