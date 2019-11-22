<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Backlogs;
use App\ProjectMembers;
use App\Sprints;
use App\Projects;
use App\Userstories;
use App\UserstoryItems;

class ScrumboardController extends Controller
{
    public function backlog_moved(Request $request) {
        $backlog_id = $request->backlog_id;
        $sprint_id = $request->sprint_id;
        $new_index = $request->index;
        $order = null;
        
        $max_index = Backlogs::where('sprint_id', $sprint_id)->orderBy('order')->count() - 1;

        if ($new_index == 0) {
            $backlog = Backlogs::where('sprint_id', $sprint_id)->where('id', '!=', $backlog_id)->orderBy('order')->first();
            $order = $backlog->order / 2;
        } elseif ($new_index == $max_index) { 
            $backlog = Backlogs::where('sprint_id', $sprint_id)->where('id', '!=', $backlog_id)->orderBy('order', 'desc')->first();
            $order = $backlog->order + 1;
        } else {
            $backlogs = Backlogs::where('sprint_id', $sprint_id)->where('id', '!=', $backlog_id)->orderBy('order')->skip($new_index - 1)->take(2)->get();
            $order = (array_sum($backlogs->pluck('order')->toArray()) / 2);
        }

        Backlogs::where('id', $backlog_id)->update(['order' => $order]);
    }

    public function userstory_item_moved(Request $request) {
        $item_id = $request->user_story_id;
        $backlog_id = $request->backlog_id;
        UserstoryItems::where('id', $item_id)->update(['backlog_id' => $backlog_id]);
    }

    public function userstory_item_added(Request $request) {
        $item = new UserstoryItems;
        $item->description = $request->description;
        $item->moscow = $request->moscow;
        $item->userstory_id = $request->userstory_id;
        $item->story_points = $request->points;
        $item->definition_of_done = $request->definition_of_done;
        $item->backlog_id = $request->backlog_id;
        $item->save();
    }

    public function backlog_added(Request $request) {
        $order = Backlogs::where('sprint_id', $request->sprint_id)->orderBy('order', 'desc')->first()->order + 1;
        
        $backlog = new Backlogs;
        $backlog->name = $request->name;
        $backlog->is_product_backlog = False;
        $backlog->order = $order;
        $backlog->label = $request->label;
        $backlog->sprint_id = $request->sprint_id;
        $backlog->save();
    }

    public function scrumboard_page($project_id = null, $sprint_id = null) {
        if (!$project_id) { $project_id = ProjectMembers::where('user_id', '=', auth()->user()->id)->pluck('project_id')->first(); }         
        if (!$sprint_id) { $sprint_id = Sprints::where('project_id', '=', $project_id)->pluck('id')->first(); }
        $all_sprints = Sprints::where('project_id', '=', $project_id)->get();
        $all_userstories = Userstories::where('project_id', '=', $project_id)->get();
        $all_backlogs = Backlogs::whereIn('sprint_id', $all_sprints->pluck('id'))->orderBy('order')->get();
        $backlogs = Backlogs::where('sprint_id', $sprint_id)->orderBy('order')->get();
        $userstory_items = UserstoryItems::whereIn('backlog_id', $all_backlogs->pluck('id'))->get();
        
        $project = Projects::find($project_id);
        $sprint = Sprints::find($sprint_id);

        return view('pages.scrumboard', 
                    ['backlogs' => $backlogs, 
                    'userstory_items' => $userstory_items, 
                    "project" => $project, 
                    "current_sprint" => $sprint,
                    "all_sprints" => $all_sprints,
                    "userstories" => $all_userstories,
                    "all_projects" => $all_projects]);
    }
}
