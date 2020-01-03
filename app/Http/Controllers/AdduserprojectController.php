<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Projects;
use App\ProjectMembers;

class AdduserprojectController extends Controller {
    public function insertform(){
        return view('userprojects');
    } 
    public function insert(Request $request){
        $user_name = $request->input('users');
        $project_name = $request->input('projects');

        $user_id = User::where('name', $user_name)->first()->getId();
        $project_id = Projects::where('name', $project_name)->first()->id;

        $values = array('user_id' => $user_id,'project_id' => $project_id);
        $projectMemberCheck = ProjectMembers::where('project_id', $project_id)->where('user_id', $user_id)->get();
        if(!$projectMemberCheck->isEmpty()){
            return redirect()->route('userprojects.userprojects')->withStatus(__('The user is already added to this project'));
        } else {
            DB::table('project_members')->insert($values);
        }

        return redirect()->route('userprojects.userprojects')->withStatus(__('User successfully added to project.'));
    }
} 