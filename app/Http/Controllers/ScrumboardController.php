<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Backlogs;
use App\Project_Members;
use App\Sprints;
use App\Projects;
use App\Userstories;
use App\Userstory_Items;

class ScrumboardController extends Controller
{
    public function backlog_moved(Request $request) {
        $backlog_id = $request->backlog_id;
        $sprint_id = $request->sprint_id;
        $new_index = $request->index;
        $order = null;

        $max_index = Backlogs::where('sprints_id', $sprint_id)->orderBy('order')->count() - 1;

        if ($new_index == 0) {
            $backlogs = Backlogs::where('sprints_id', $sprint_id)->orderBy('order')->first();
            $order = $backlogs->order / 2;
        } elseif ($new_index == $max_index) { 
            $backlogs = Backlogs::where('sprints_id', $sprint_id)->orderBy('order', 'desc')->first();
            $order = $backlogs->order + 1;
        } else {
            $backlogs = Backlogs::where('sprints_id', $sprint_id)->orderBy('order')->skip($new_index - 1)->take(2)->get();
            $order = array_sum($backlogs->pluck('order')->toArray()) / 2;
        }

        Backlogs::where('id', $backlog_id)->update(['order' => $order]);
    }

    public function userstory_item_moved(Request $request) {
        $item_id = $request->user_story_id;
        $backlog_id = $request->backlog_id;
        Userstory_Items::where('id', $item_id)->update(['backlog_id' => $backlog_id]);
    }

    public function userstory_item_added(Request $request) {
        $item = new Userstory_Items;
        $item->description = $request->description;
        $item->moscow = $request->moscow;
        $item->userstory_id = $request->userstory_id;
        $item->status = "to do";
        $item->story_points = $request->points;
        $item->definition_of_done = $request->definition_of_done;
        $item->backlog_id = $request->backlog_id;
        $item->save();
    }

    public function scrumboard_page($project_id = null, $sprint_id = null) {
        if (!$project_id) { $project_id = Project_Members::where('user_id', '=', auth()->user()->id)->pluck('projects_id')->first(); }         
        if (!$sprint_id) { $sprint_id = Sprints::where('projects_id', '=', $project_id)->pluck('id')->first(); }

        $backlogs = Backlogs::where('sprints_id', $sprint_id)->orderBy('order')->get();
        $userstory_items = Userstory_Items::whereIn('backlog_id', $backlogs->pluck('id'))->get();

        $project = Projects::find($project_id);
        $sprint = Sprints::find($sprint_id);
        $all_sprints = Sprints::where('projects_id', '=', $project_id)->get();
        $all_userstories = Userstories::where('projects_id', '=', $project_id)->get();

        return view('pages.scrumboard', 
                    ['backlogs' => $backlogs, 
                    'userstory_items' => $userstory_items, 
                    "project" => $project, 
                    "current_sprint" => $sprint,
                    "all_sprints" => $all_sprints,
                    "userstories" => $all_userstories]);
    }
}
