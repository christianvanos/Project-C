<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backlogs extends Model
{
    protected $table = "backlogs";

    public function sprints()
    {
        return $this->belongsTo(Sprints::class);
    }

    public function userstory_items()
    {
        return $this->hasMany(Userstory_Items::class);
    }
}
