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

class ReviewController extends Controller
{
    public function index(Request $request){
        $project = Projects::find($request->id);
        $reviewData = collect();
        foreach($project->sprints()->get() as $sprint)
        {
            foreach($sprint->meetings()->get() as $meeting)
            {
                if($meeting->type == "sprint review")
                {
                    $reviewData->push([$sprint->number, $meeting->description, $meeting->file, $meeting->id]);
                }
            }
        }
        return view('pages.reviews', ['data' => $reviewData, 'project' => $project, 'current_project' => $project->id, 'admin' => \Auth::user()->isadmin()]);
    }

    /**
     * Create page for review
     *
     * @param  Request  $request
     * @param  string  $id
     */
    public function create(Request $request,$id){
        $project = Projects::find($request->id);
        $reviewData = collect();
        $sprintNumbers = collect();
        foreach($project->sprints()->get() as $sprint)
        {
            $sprintNumbers->push($sprint->number);
            foreach($sprint->meetings()->get() as $meeting)
            {
                if($meeting->type == "sprint review")
                {
                    $reviewData->push($sprint->number);
                }
            }
        }

        foreach($reviewData as $reviewNumber) 
        {
            $sprintNumbers->pull($reviewNumber - 1);
        }

        return view('pages.reviewscreate', ['sprintNumbers' => $sprintNumbers, 'project' => $project, 'current_project' => $project->id]);
    }

    public function store(Request $request){
        $sprints = Sprints::where('project_id',$request->invisible)->get();
        $sprint_id = $sprints[$request->sprintNumber - 1]->id;
        $sprintMeeting = new SprintMeetings();
        $sprintMeeting->type = 'sprint review';
        $sprintMeeting->description = $request->outcome;
        $sprintMeeting->file = $request->file('file')->store('');
        $sprintMeeting->sprint_id = $sprint_id;
        $sprintMeeting->save();
        return redirect('reviews?id=' . $request->invisible);
    }

    public function delete($id){
        $review = SprintMeetings::find($id);
        $review->delete();
        Storage::delete($review->file);
        return redirect()->back();
    }

    public function edit($id){
        $sprintMeeting = SprintMeetings::find($id);
        $project = Projects::find($sprintMeeting->sprint()->first()->project_id);
        $reviewData = collect();
        $sprintNumbers = collect();
        foreach($project->sprints()->get() as $sprint)
        {
            $sprintNumbers->push($sprint->number);
            foreach($sprint->meetings()->get() as $meeting)
            {
                if($meeting->type == "sprint review")
                {
                    $reviewData->push($sprint->number);
                }
            }
        }

        foreach($reviewData as $reviewNumber) 
        {
            $sprintNumbers->pull($reviewNumber - 1);
        }

        return view('pages.reviewsedit', ['sprintNumbers' => $sprintNumbers, 'project' => $project, 'current_project' => $project->id, 'data' => $sprintMeeting, 'meeting_id' => $id]);
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
        return redirect('reviews?id=' . $request->invisible);
    }
}
