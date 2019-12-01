<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = "projects";

    public function sprints()
    {
        return $this->hasMany('App\Sprints', 'project_id');
    }

    public function userstories()
    {
        return $this->hasMany('App\Userstories', 'project_id');
    }

    public function members()
    {
        return $this->hasMany('App\ProjectMembers', 'project_id');
    }
}
