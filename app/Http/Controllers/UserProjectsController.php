<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Project_Members;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class UserProjectsController extends Controller
{
    public function index()
    {
        $currentLoggedInUserID = Auth::user()->getId();
        $projectMembers = Project_Members::where('user_id', $currentLoggedInUserID)->get();
        $projects = collect();
        foreach($projectMembers as $projectMember) {
            $projects->push([$projectMember->projects()->first()->name, $projectMember->projects_id]);
        }

        return view('pages.user_projects', ['projects' => $projects]);
    }
}
