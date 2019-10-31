<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint_Meeting_Present extends Model
{
    protected $table = "sprint_meeting_present";

    public function meeting()
    {
        return $this->hasMany(Sprint_Meeting::class);
    }

    public function project_members()
    {
        return $this->belongsTo(Project_Members::class);
    }
}
