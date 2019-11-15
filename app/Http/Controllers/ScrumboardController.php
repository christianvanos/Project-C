<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Backlogs;
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
}
