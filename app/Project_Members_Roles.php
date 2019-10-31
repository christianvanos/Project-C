<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_Members_Roles extends Model
{
    protected $table = "project_members_roles";

    public function project_members_roles()
    {
        return $this->belongsTo(Project_Members_Roles::class);
    }
}
