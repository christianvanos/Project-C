<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userstory_Items extends Model
{
    protected $table = "userstory_items";
  
    public function backlogs()
    {
        return $this->belongsTo(Backlogs::class);
    }

    public function userstory()
    {
        return $this->belongsTo(Userstories::class);
    }

    public function userstory_item_tasks()
    {
        return $this->hasMany(Userstory_Item_tasks::class);
    }    
}
