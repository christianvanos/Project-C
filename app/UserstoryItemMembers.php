<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserstoryItemMembers extends Model
{
    protected $table = "userstory_item_members";

    protected $fillable = [
        'item_id', 'member_id'
    ];

    public function item()
    {
        return $this->belongsTo('App\UserstoryItems', 'item_id');
    }

    public function member()
    {
        return $this->belongsTo('App\ProjectMembers', 'member_id');
    }
}
