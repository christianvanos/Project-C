<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userstories extends Model
{
    protected $table = "userstories";

    public function project()
    {
        return $this->belongsTo('App\Projects', 'project_id');
    }

    public function items()
    {
        return $this->hasMany('App\UserstoryItems', 'userstory_id');
    }
}
