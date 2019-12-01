<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LaravelGoogleGraph extends Controller
{
    function index()
    {
     $data = DB::table('userstory_item_members')
       ->select(
        DB::raw('member_id as user'),
        DB::raw('count(*) as number '))
       ->groupBy('user')
       ->get();
     $array[] = ['User', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->user, $value->number];
     }
     return view('userprojects.google_pie_chart')->with('user', json_encode($array));
    }
}

