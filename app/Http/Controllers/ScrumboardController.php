<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Backlogs;
use App\ProjectMembers;
use App\Sprints;
use App\Projects;
use App\Userstories;
use App\UserstoryItems;
use App\ItemHistory;
use App\UserstoryItemMembers;
use Carbon\Carbon;

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
        $backlog = Backlogs::find($request->backlog_id);
        $item = UserstoryItems::find($request->user_story_id);
        UserstoryItems::where('id', $item->id)->update(['backlog_id' => $backlog->id]);
        
        $today = ItemHistory::whereDate('created_at', Carbon::today())->where('sprint_id', $backlog->sprint->id)->first();
        if ($today === null) {
            $history = New ItemHistory;
            $history->story_points = "0";
            $history->sprint_id = $backlog->sprint->id;
            $history->save();
        }

        $today = ItemHistory::whereDate('created_at', Carbon::today())->where('sprint_id', $backlog->sprint->id)->first();
        $history = ItemHistory::find($today->id);
        $history->story_points = DB::table('backlogs')
                                    ->join('userstory_items', 'backlogs.id', '=', 'userstory_items.backlog_id')
                                    ->where('backlogs.sprint_id', $backlog->sprint_id)
                                    ->where('backlogs.is_product_backlog', False)
                                    ->where('backlogs.label', '!=', "done")
                                    ->sum('userstory_items.story_points');
        $history->save();
    }

    public function userstory_item_added(Request $request) {
        $backlog = Backlogs::find($request->backlog_id);

        $item = new UserstoryItems;
        $item->description = $request->description;
        $item->moscow = $request->moscow;
        $item->userstory_id = $request->userstory_id;
        $item->story_points = $request->points;
        $item->definition_of_done = $request->definition_of_done;
        $item->backlog_id = $request->backlog_id;
        $item->save();

        $item_member = new UserstoryItemMembers;
        $item_member->member_id = $request->member_id;
        $item_member->item_id = $item->id;
        $item_member->save();
        
        $today = ItemHistory::whereDate('created_at', Carbon::today())->where('sprint_id', $backlog->sprint->id)->first();
        if ($today === null) {
            $history = New ItemHistory;
            $history->story_points = "0";
            $history->sprint_id = $backlog->sprint->id;
            $history->save();
        }

        $today = ItemHistory::whereDate('created_at', Carbon::today())->where('sprint_id', $backlog->sprint->id)->first();
        $history = ItemHistory::find($today->id);
        $history->story_points = DB::table('backlogs')
                                    ->join('userstory_items', 'backlogs.id', '=', 'userstory_items.backlog_id')
                                    ->where('backlogs.sprint_id', $backlog->sprint_id)
                                    ->where('backlogs.is_product_backlog', False)
                                    ->where('backlogs.label', '!=', "done")
                                    ->sum('userstory_items.story_points');
        $history->save();
    }

    public function userstory_item_edited(Request $request) {
        switch ($request->input('submit')) {
            case 'delete':
                    UserstoryItems::find($request->item_id)->delete();
                break;
            case 'update':
                $item = UserstoryItems::find($request->item_id);
                $item->description = $request->description;
                $item->moscow = $request->moscow;
                $item->userstory_id = $request->userstory_id;
                $item->story_points = $request->points;
                $item->definition_of_done = $request->definition_of_done;
                $item->save();

                $item_member = UserstoryItemMembers::updateOrCreate(
                    ['item_id' => $request->item_id], 
                    ['member_id' => $request->member_id, 'item_id' => $request->item_id]
                );
                break;

                $today = ItemHistory::whereDate('created_at', Carbon::today())->where('sprint_id', $backlog->sprint->id)->first();
                if ($today === null) {
                    $history = New ItemHistory;
                    $history->story_points = "0";
                    $history->sprint_id = $backlog->sprint->id;
                    $history->save();
                }

                $today = ItemHistory::whereDate('created_at', Carbon::today())->where('sprint_id', $backlog->sprint->id)->first();
                $history = ItemHistory::find($today->id);
                $history->story_points = DB::table('backlogs')
                                            ->join('userstory_items', 'backlogs.id', '=', 'userstory_items.backlog_id')
                                            ->where('backlogs.sprint_id', $backlog->sprint_id)
                                            ->where('backlogs.is_product_backlog', False)
                                            ->where('backlogs.label', '!=', "done")
                                            ->sum('userstory_items.story_points');
                $history->save();
        }
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

    public function backlog_edited(Request $request) {
        switch ($request->input('submit')) {
            case 'delete':
                Backlogs::find($request->backlog_id)->delete();
                break;
            case 'update':
                $backlog = Backlogs::find($request->backlog_id);
                $backlog->name = $request->name;
                $backlog->label = $request->label;
                $backlog->save();
        }
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
        
        $total_sprint_days = floor(abs(strtotime($sprint->end_date) - strtotime($sprint->start_date))/(60*60*24));

        if (strtotime(new Carbon(Carbon::today()->toDateString())) > strtotime($sprint->end_date)) {
            $percentage = 100;
        } elseif (strtotime($sprint->start_date) > strtotime(new Carbon(Carbon::today()->toDateString()))) {
            $percentage = 0;
        } else {
            $days_done = $total_sprint_days - floor(abs(strtotime($sprint->end_date) - strtotime(new Carbon(Carbon::today()->toDateString())))/(60*60*24));
            $percentage = round($days_done / $total_sprint_days * 100, 0);
        }

        

        return view('pages.scrumboard', 
                    ['backlogs' => $backlogs, 
                    'userstory_items' => $userstory_items, 
                    "current_project" => $project->id, 
                    "project" => $project, 
                    "current_sprint" => $sprint,
                    "all_sprints" => $all_sprints,
                    "userstories" => $all_userstories,
                    "percentage" => $percentage]);
    }
}
