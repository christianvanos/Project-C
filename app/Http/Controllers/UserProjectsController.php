<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ProjectMembers;
use App\Projects;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class UserProjectsController extends Controller
{
    public function index()
    {
        $currentLoggedInUserID = Auth::user()->getId();
        $projects = collect();
        if (Auth::user()->isAdmin())
        {
            $allProjects = Projects::all();
            foreach( $allProjects as $project ){
                $projects->push([$project->name, $project->id]);
            }
        } else{
            $projectMembers = ProjectMembers::where('user_id', $currentLoggedInUserID)->get();
            foreach($projectMembers as $projectMember) {
                $projects->push([$projectMember->projects()->first()->name, $projectMember->projects_id]);
            }
        }
        return view('pages.user_projects', ['projects' => $projects]);
    }
}
