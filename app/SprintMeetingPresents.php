<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprintMeetingPresents extends Model
{
    protected $table = "sprint_meeting_presents";

    public function meeting()
    {
        return $this->belongsTo('App\SprintMeetings', 'meeting_id');
    }

    public function member()
    {
        return $this->belongsTo('App\ProjectMembers', 'member_id');
    }
}
