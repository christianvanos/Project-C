<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Projects;
use App\Sprints;
use App\Daily_Scrums;
use Illuminate\Support\Facades\Auth;
class ProjectsController extends Controller
{
    public function index(){
    	$projects = Projects::all();
    	return view('projects.index', compact('projects'));
    }
    public function create(){
    	return view('projects.create');
    }
    public function store(){
    	$project = new Projects();
    	$project->name = request('title');
    	$project->save();
    	return redirect('/projects');
    }
    public function edit(Projects $project){
    	
    	return view('projects.edit', compact('project'));
    }
    public function update(Project $project){
    	
    	$project->name = request('title');
    	$project->save();
    	return redirect("/projects");
    }
    public function destroy($id){
    	Projects::findOrFail($id)->delete();
    	return redirect("/projects");
    }
	public function daily_scrums(Projects $project)
    {
        $currentLoggedInUser = Auth::user();
        $user_name = $currentLoggedInUser->name;
        return view('projects.dScrums', ["user_name"=>$user_name],compact("project"));
	}
	
	public function create_daily_scrum(Request $request,$id)
    {
		$project = Projects::findOrFail($id);
        $currentLoggedInUser = Auth::user();
        $daily_scrum = new Daily_Scrums();

        $daily_scrum->member_id = $currentLoggedInUser->id;
        $daily_scrum->sprint_id = $project->sprints->last()->id;
        $daily_scrum->is_doing = request("is_doing");
        $daily_scrum->has_done = request("has_done");
        $daily_scrum->errors = request("errors");
        $daily_scrum->save();

        return redirect("/projects");
         
    }
    public function sprint(Projects $project){
        $sprints = $project->sprints();
    	return view('projects.sprint', compact('project'), compact("sprints"));
    }

    public function nav_daily_scrums(Projects $project){
        dump($project);
        
    	return view('projects.daily_scrums', compact("project"));
    }
}