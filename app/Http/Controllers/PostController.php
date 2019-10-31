<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Userstory_Items;

class PostController extends Controller
{
    public function scrumboard_item_moved(Request $request) {
        $item_id = $request->user_story_id;
        $backlog_id = $request->backlog_id;
        DB::table('userstory_items')->where('id', $item_id)->update(['backlog_id' => $backlog_id]);
    }

    public function scrumboard_item_added(Request $request) {
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
