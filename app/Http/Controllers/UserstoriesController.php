<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Projects;
use App\Userstories;

class UserstoriesController extends Controller
{
    public function Userstories_page($project_id) {
        $project = Projects::find($project_id);
        $userstories = Userstories::where('project_id', '=', $project_id)->get();

        return view('pages.userstories', [
            'project' => $project,
            'userstories' => $userstories,
            "current_project" => $project->id
        ]);
    }
}