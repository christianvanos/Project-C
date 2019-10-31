<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint_Meeting extends Model
{
    protected $table = "sprint_meeting";

    public function sprints()
    {
        return $this->belongsTo(Sprints::class);
    }

    public function present()
    {
        return $this->belongsTo(Sprint_Meeting_Present::class);
    }
}
