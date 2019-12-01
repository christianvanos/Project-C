<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyScrums extends Model
{
    protected $table = "daily_scrums";

    public function member()
    {
        return $this->belongsTo('App\ProjectMembers', 'members_id');
    }

    public function sprint()
    {
        return $this->belongsTo('App\Sprints', 'sprints_id');
    }
}
