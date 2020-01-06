<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemHistory extends Model
{
    protected $table = "item_history";

    public function item() 
    {
        return $this->belongsTo('App\UserstoryItems', 'item_id');
    }
}
