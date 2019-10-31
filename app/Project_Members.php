<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_Members extends Model
{
    protected $table = "project_members";

    public function daily_scrums()
    {
        return $this->hasMany(Daily_Scrums::class);
    }

    public function projects()
    {
        return $this->belongsTo(Projects::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sprint_meeting_present()
    {
        return $this->hasMany(Sprint_Meeting_Present::class);
    }

    public function project_members_roles()
    {
        return $this->hasMany(Project_Members_Roles::class);
    }

    public function userstory_items_tasks()
    {
        return $this->hasMany(Userstory_Items_tasks::class);
    }
}