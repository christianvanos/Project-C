<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserstoryItems extends Model
{
    protected $table = "userstory_items";

    public function backlog()
    {
        return $this->belongsTo('App\Backlogs', 'backlog_id');
    }

    public function userstory()
    {
        return $this->belongsTo('App\Userstories', 'userstory_id');
    }

    public function members()
    {
        return $this->hasMany('App\UserstoryItemMembers', 'item_id');
    }    
}
