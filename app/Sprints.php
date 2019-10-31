<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprints extends Model
{
    protected $table = "sprints";

    public function projects()
    {
        return $this->belongsTo(Projects::class);
    }

    public function backlogs()
    {
        return $this->hasMany(Backlogs::class);
    }

    public function daily_scrums()
    {
        return $this->hasMany(Daily_Scrums::class);
    }

    public function sprint_meetings()
    {
        return $this->hasMany(Sprint_Meeting::class);
    }

}
