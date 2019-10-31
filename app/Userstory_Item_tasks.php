<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userstory_Item_tasks extends Model
{
    protected $table = "userstory_item_tasks";

    public function userstory_item()
    {
        return $this->belongsTo(Userstory_Items::class);
    }

    public function member()
    {
        return $this->belongsTo(Project_Members::class);
    }
}
