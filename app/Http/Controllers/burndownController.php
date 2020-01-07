<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemHistory;
use App\UserstoryItems;
use DB;

class burndownController extends Controller
{
  function index()
  {
    $sprint_id = 4;

    $history_data = ItemHistory::where('sprint_id', $sprint_id)->select(DB::raw('DATE_FORMAT(DATE(created_at), "%d-%b-%Y") as date, story_points as day_points, sprint_id'))->oldest()->get();

    dump($history_data);

    return view('userprojects.charts', [
      "burndowntotal" => 192
    ]);
  }
}

