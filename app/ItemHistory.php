<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemHistory extends Model
{
    protected $table = "item_history";

    public function sprint() 
    {
        return $this->belongsTo('App\Sprints', 'sprint_id');
    }
}
