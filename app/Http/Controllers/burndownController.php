<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\UserstoryItems;

class burndownController extends Controller
{
  function index()
  {
    $burndowntotal = UserstoryItems::all()->sum("story_points");
    dump($burndowntotal);
    $array[] = [$burndowntotal];
    // dd($array);


    return view('userprojects.charts')->with('burndowntotal', json_encode($array));
  }
}

