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

    public function status() 
    {
        $todo = 0;
        $doing = 0;
        $done = 0;
        $items = $this->items;
        foreach($items as $item) {
            $label = $item->backlog->label;
            if ($label == "todo") {$todo += 1;}
            if ($label == "doing") {$doing += 1;}
            if ($label == "done") {$done += 1;}
        }
        if (($todo + $doing + $done) != 0) {
            return round((($doing / 2) + $done) / ($todo + $doing + $done) * 100, 2);
        } else {
            return 0;
        }
    }
}
