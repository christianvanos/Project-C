<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily_Scrums extends Model
{
    protected $table = "daily_scrums";

    public function members()
    {
        return $this->belongsTo(Project_Members::class);
    }

    public function sprints()
    {
        return $this->belongsTo(Sprints::class);
    }
}
