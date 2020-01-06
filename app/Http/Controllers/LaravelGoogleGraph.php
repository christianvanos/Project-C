<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\ProjectMembers;
use App\UserstoryItemMembers;
use App\UserstoryItems;

class LaravelGoogleGraph extends Controller
{
    function index()
    {
      $currentLoggedInUser = Auth::user();
    $user_id = $currentLoggedInUser->id;
    $member_id = ProjectMembers::find($user_id)->id;

    $userstories = UserstoryItemMembers::all()->where("member_id",$member_id);
    $userstoriesArray[]=[];

    foreach($userstories as $userstory){
      $userstoriesArray[$userstory->id] = UserstoryItems::find($userstory->id);
    }
    //dump($userstoriesArray);
    
     $data = $userstoriesArray[3]
       ->select(
        DB::raw('description as description'),
        DB::raw('count(*) as number '))
       ->groupBy('description')
       ->get();
     $array[] = ['description', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->description, $value->number];
     }
     return view('userprojects.google_pie_chart')->with('description', json_encode($array));
    }
}

