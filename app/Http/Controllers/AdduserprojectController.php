<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdduserprojectController extends Controller {
    public function insertform(){
        return view('userprojects');
    } 
    public function insert(Request $request){
        $user_id = $request->input('user_id');
        $projects_id = $request->input('projects_id');
        $data=array('user_id'=>$user_id,"projects_id"=>$projects_id);
        DB::table('project_members')->insert($data);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/userprojects">Click Here</a> to go back.';
    }
} 