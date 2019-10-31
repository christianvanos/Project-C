<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userstories extends Model
{
    protected $table = "userstories";

    public function projects()
    {
        return $this->belongsTo(Projects::class);
    }

    public function userstory_items()
    {
        return $this->hasMany(Userstory_Items::class);
    }
}
