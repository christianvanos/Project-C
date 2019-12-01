<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SprintMeetings;
use App\Projects;
use Illuminate\Support\Collection;

class RetrospectiveController extends Controller
{
    public function index(Request $request){
        $project = Projects::find($request->id);
        $retroData = collect();
        foreach($project->sprints()->get() as $sprint)
        {
            foreach($sprint->meetings()->get() as $meeting)
            {
                if($meeting->type == "sprint retro")
                {
                    $retroData->push([$meeting->sprint_id, $meeting->description]);
                }
            }
        }
        return view('pages.retrospectives', ['data' => $retroData]);
    }
}
