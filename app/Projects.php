<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = "projects";

    public function sprints()
    {
        return $this->hasMany(Sprints::class);
    }

    public function userstories()
    {
        return $this->hasMany(Userstories::class);
    }

    public function project_members()
    {
        return $this->hasMany(Project_Members::class);
    }
}
