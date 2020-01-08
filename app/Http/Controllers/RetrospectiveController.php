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
use Illuminate\Support\Facades\Validator;

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
                    $retroData->push([$sprint->number, $meeting->description, $meeting->file, $meeting->id]);
                }
            }
        }
        return view('pages.retrospectives', ['data' => $retroData, 'project' => $project, 'current_project' => $project->id, 'admin' => \Auth::user()->isadmin()]);
    }

    /**
     * Create page for retro
     *
     * @param  Request  $request
     * @param  string  $id
     */
    public function create(Request $request,$id){
        $project = Projects::find($request->id);
        $retroData = collect();
        $sprintNumbers = collect();
        foreach($project->sprints()->get() as $sprint)
        {
            $sprintNumbers->push($sprint->number);
            foreach($sprint->meetings()->get() as $meeting)
            {
                if($meeting->type == "sprint retro")
                {
                    $retroData->push($sprint->number);
                }
            }
        }

        foreach($retroData as $retroNumber) 
        {
            $sprintNumbers->pull($retroNumber - 1);
        }
        
        return view('pages.retrospectivecreate', ['sprintNumbers' => $sprintNumbers, 'project' => $project, 'current_project' => $project->id]);
    }

    public function store(Request $request){
        $sprints = Sprints::where('project_id',$request->invisible)->get();
        $sprint_id = $sprints[$request->sprintNumber - 1]->id;
        $sprintMeeting = new SprintMeetings();
        $sprintMeeting->type = 'sprint retro';
        $sprintMeeting->description = $request->outcome;

        // File validation checks in the config file what are the correct values
        $allowedFileTypes = config('app.allowedFileTypes');
        $maxFileSize = config('app.maxFileSize');
        $rules = [
            'file' => 'required|mimes:'.$allowedFileTypes.'|max:'.$maxFileSize
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return redirect('retrospectives?id=' . $request->invisible)->with('error', 'The uploaded file is not valid');
        }

        $sprintMeeting->file = $request->file('file')->store('');
        $sprintMeeting->sprint_id = $sprint_id;
        $sprintMeeting->save();
        return redirect('retrospectives?id=' . $request->invisible)->with('status', 'Retrospective created');
    }

    public function delete($id){
        $retro = SprintMeetings::find($id);
        $retro->delete();
        Storage::delete($retro->file);
        return redirect()->back();
    }

    public function edit($id){
        $sprintMeeting = SprintMeetings::find($id);
        $project = Projects::find($sprintMeeting->sprint()->first()->project_id);
        $retroData = collect();
        $sprintNumbers = collect();
        foreach($project->sprints()->get() as $sprint)
        {
            $sprintNumbers->push($sprint->number);
            foreach($sprint->meetings()->get() as $meeting)
            {
                if($meeting->type == "sprint retro")
                {
                    $retroData->push($sprint->number);
                }
            }
        }

        foreach($retroData as $retroNumber) 
        {
            $sprintNumbers->pull($retroNumber - 1);
        }

        return view('pages.retrospectiveedit', ['sprintNumbers' => $sprintNumbers, 'project' => $project, 'current_project' => $project->id, 'data' => $sprintMeeting, 'meeting_id' => $id]);
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
        return redirect('retrospectives?id=' . $request->invisible);
    }
}
