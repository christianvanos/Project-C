<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SprintMeetings;
use App\Projects;
use App\Sprints;
use Illuminate\Support\Collection;
use App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\Storage;

class sprint_planningController extends Controller
{
    public function index(Request $request){
        $project = Projects::find($request->id);
        $planningData = collect();
        foreach($project->sprints()->get() as $sprint)
        {
            foreach($sprint->meetings()->get() as $meeting)
            {
                if($meeting->type == "sprint planning")
                {
                    $planningData->push([$sprint->number, $meeting->description, $meeting->file, $meeting->id]);
                }
            }
        }
        return view('pages.sprint_planning', ['data' => $planningData, 'project' => $project, 'current_project' => $project->id, 'admin' => \Auth::user()->isadmin()]);
    }

    /**
     * Create page for sprint planning
     *
     * @param  Request  $request
     * @param  string  $id
     */
    public function create(Request $request,$id){
        $project = Projects::find($request->id);
        $planningData = collect();
        $sprintNumbers = collect();
        foreach($project->sprints()->get() as $sprint)
        {
            $sprintNumbers->push($sprint->number);
            foreach($sprint->meetings()->get() as $meeting)
            {
                if($meeting->type == "sprint planning")
                {
                    $planningData->push($sprint->number);
                }
            }
        }

        foreach($planningData as $planningNumber) 
        {
            $sprintNumbers->pull($planningNumber - 1);
        }

        return view('pages.sprintPlanningcreate', ['sprintNumbers' => $sprintNumbers, 'project' => $project, 'current_project' => $project->id]);
    }

    public function store(Request $request){
        $sprints = Sprints::where('project_id',$request->invisible)->get();
        $sprint_id = $sprints[$request->sprintNumber - 1]->id;
        $sprintMeeting = new SprintMeetings();
        $sprintMeeting->type = 'sprint planning';
        $sprintMeeting->description = $request->outcome;
        $sprintMeeting->file = $request->file('file')->store('');
        $sprintMeeting->sprint_id = $sprint_id;
        $sprintMeeting->save();
        return redirect('sprintPlanning?id=' . $request->invisible);
    }

    public function delete($id){
        $planning = SprintMeetings::find($id);
        $planning->delete();
        Storage::delete($planning->file);
        return redirect()->back();
    }

    public function edit($id){
        $sprintMeeting = SprintMeetings::find($id);
        $project = Projects::find($sprintMeeting->sprint()->first()->project_id);
        $planningData = collect();
        $sprintNumbers = collect();
        foreach($project->sprints()->get() as $sprint)
        {
            $sprintNumbers->push($sprint->number);
            foreach($sprint->meetings()->get() as $meeting)
            {
                if($meeting->type == "sprint planning")
                {
                    $planningData->push($sprint->number);
                }
            }
        }

        foreach($planningData as $planningNumber) 
        {
            $sprintNumbers->pull($planningNumber - 1);
        }

        return view('pages.sprintPlanningedit', ['sprintNumbers' => $sprintNumbers, 'project' => $project, 'current_project' => $project->id, 'data' => $sprintMeeting, 'meeting_id' => $id]);
    }

    public function update(Request $request){
        $sprints = Sprints::where('project_id',$request->invisible)->get();
        $meeting = SprintMeetings::find($request->meeting_id);
        $sprint_id = $sprints[$request->sprintNumber - 1]->id;
        $meeting->description = $request->outcome;
        $meeting->sprint_id = $sprint_id;
        if ($request->file != null){
            Storage::delete($meeting->file);
            $meeting->file = $request->file('file')->store('');
        }
        $meeting->save();
        return redirect('sprintPlanning?id=' . $request->invisible);
    }
}
