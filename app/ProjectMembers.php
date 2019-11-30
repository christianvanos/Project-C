<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectMembers extends Model
{
    protected $table = "project_members";

    public function dailyscrums()
    {
        return $this->hasMany('App\DailyScrums', 'member_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Projects', 'project_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function presents()
    {
        return $this->hasMany('App\SprintMeetingPresents', 'member_id');
    }

    public function roles()
    {
        return $this->hasMany('App\ProjectMemberRoles', 'member_id');
    }

    public function members()
    {
        return $this->hasMany('App\UserstoryItemMembers', 'member_id');
    }
}