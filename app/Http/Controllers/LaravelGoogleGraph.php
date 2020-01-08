<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\ProjectMembers;
use App\UserstoryItemMembers;
use App\UserstoryItems;
use App\Backlogs;

class LaravelGoogleGraph extends Controller
{
    function index($project_id, $sprint_id)
    {
      $headers = array("description", "Number");
      $labels = UserstoryItems::join("backlogs", "userstory_items.backlog_id", "=", "backlogs.id")
                        ->where("backlogs.sprint_id", $sprint_id)
                        ->select("backlogs.label", DB::raw("COUNT(backlogs.label) as amount"))
                        ->groupBy("backlogs.label")
                        ->orderBy("amount", "DESC")
                        ->get()->toArray();

      $result = array($headers);
      foreach ($labels as $label) {
        array_push($result, array_values($label));
      }

     return view('userprojects.google_pie_chart', [
       "result" => $result
     ]);
    }
}

