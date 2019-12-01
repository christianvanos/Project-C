<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LaravelGoogleGraph extends Controller
{
    function index()
    {
     $data = DB::table('backlogs')
       ->select(
        DB::raw('name as name'),
        DB::raw('count(*) as number '))
       ->groupBy('name')
       ->get();
     $array[] = ['Name', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->name, $value->number];
     }
     return view('userprojects.google_pie_chart')->with('name', json_encode($array));
    }
}

