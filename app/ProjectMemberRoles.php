<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectMemberRoles extends Model
{
    protected $table = "project_member_roles";

    public function member()
    {
        return $this->belongsTo('App\ProjectMembers', 'member_id');
    }
}
