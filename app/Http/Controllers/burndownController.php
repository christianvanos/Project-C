<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemHistory;
use App\UserstoryItems;
use App\Sprints;
use DB;

class burndownController extends Controller
{
  function index()
  {
    $sprint_id = 4;

    $history_data = ItemHistory::where('sprint_id', $sprint_id)->select(DB::raw('DATE_FORMAT(DATE(created_at), "%d-%b-%Y") as date, story_points as day_points'))->oldest()->get()->toArray();

    $sprint = Sprints::find($sprint_id);
    $start_date = $sprint->start_date;
    $end_date = $sprint->end_date;
    $current_date = $start_date;
    $history_to_view = array();

    while (strtotime($current_date) <= strtotime($end_date)) {
      $temp_date = date_format(date_create($current_date), "d-M-Y");

      $found_in_history = false;
      foreach($history_data as $data) {
        if (in_array($temp_date, $data)) {
          array_push($history_to_view, $data);
          $found_in_history = true;
        }
      }

      if (!$found_in_history) {
        $yesterday = date ("d-M-Y", strtotime("-1 day", strtotime($current_date)));
        if (array_search($yesterday, array_column($history_to_view, 'date')) === false) {
          array_push($history_to_view, array("date" => $temp_date, "day_points" => "0"));
        } else {
          $points_yesterday = $history_to_view[array_search($yesterday, array_column($history_to_view, 'date'))]["day_points"];
          array_push($history_to_view, array("date" => $temp_date, "day_points" => $points_yesterday));
        }
      }

      $current_date = date ("Y-m-d", strtotime("+1 day", strtotime($current_date)));
    }

    $dates = array_column($history_to_view, 'date');
    $points = array_map(function($value) {return (int)$value;}, array_column($history_to_view, 'day_points'));
    $amount = count($dates);
    $fake_points = array_fill(0, $amount, 0);
    $burndownline = array();

    $steps = (max($points))/($amount-1);
    $max = max($points);
    for ($i = 0; $i < $amount; $i++) {
      if($i + 1 == $amount) {
        array_push($burndownline, 0);
      } else {
        array_push($burndownline, $max);
        $max -= $steps;
      }
    }

    $key = array_search(date("d-M-Y"), $dates) + 1;
    for ($key; $key <= $amount - 1; $key++) {
      $points[$key] = "null";
    }

    return view('userprojects.charts', [
      "dates" => $dates,
      "points" => $points,
      "amount" => $amount,
      "fake_points" => $fake_points,
      "burndown_coordinates" => $burndownline
    ]);
  }
}

