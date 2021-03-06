<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Projects;
use App\Sprints;
use App\Backlogs;
use App\Daily_Scrums;
use Illuminate\Support\Facades\Auth;
use App\ProjectMembers;
use App\User;
use Carbon\Carbon;
class ProjectsController extends Controller
{
    public function index(){
        $projects = Projects::join('project_members', 'projects.id', '=', 'project_members.project_id')
                            ->where("user_id", auth()->user()->id)
                            ->select("projects.*")
                            ->get();

    	return view('projects.index', compact('projects', "projects"));
    }
    public function create(){
    	return view('projects.create');
    }
    public function store(Request $request){
        
        $this->validate($request, [
            'title' => 'required',
        ]);
    	$project = new Projects();
    	$project->name = request('title');
        $project->save();
        
        $admins = User::where("type", "admin")->get();
        foreach($admins as $admin) {
            $member = new ProjectMembers;
            $member->project_id = $project->id;
            $member->user_id = $admin->id;
            $member->save();
        }

        if(auth()->user()->type == "default") {
            $member = new ProjectMembers;
            $member->project_id = $project->id;
            $member->user_id = auth()->user()->id;
            $member->save();
        }

        $sprint = new Sprints;
        $sprint->number = "1";
        $sprint->project_id = $project->id;
        $sprint->start_date = Carbon::now();
        $sprint->end_date = Carbon::now()->addDays(14);
        $sprint->save();

        $productbacklog = new Backlogs;
        $productbacklog->name = "Product Backlog";
        $productbacklog->is_product_backlog = true;
        $productbacklog->order = 1;
        $productbacklog->label = "todo";
        $productbacklog->sprint_id = $sprint->id;
        $productbacklog->save();

    	return redirect('/projects');
    }
    public function edit(Projects $project){
    	
    	return view('projects.edit', compact('project'));
    }
    public function update(Projects $project,Request $request){

    	$this->validate($request, [
            'title' => 'required',
        ]);

    	$project->name = request('title');
    	$project->save();
    	return redirect("/projects");
    }
    public function destroy($id){
    	Projects::findOrFail($id)->delete();
    	return redirect("/projects");
    }
	public function daily_scrums(Projects $project, $sprint_id)
    {
        $currentLoggedInUser = Auth::user();
        $user_name = $currentLoggedInUser->name;
        $current_project = $project->id;
        $sprint = Sprints::find($sprint_id);

        return view('projects.dScrums', ["user_name"=>$user_name, "sprint" => $sprint],compact("project", "current_project"));
	}
	
	public function create_daily_scrum(Request $request,$project_id, $sprint_id  )
    {
        $this->validate($request, [
            'is_doing' => 'required',
            'has_done' => 'required',
            'errors'   => 'required'
        ]);
		$project = Projects::findOrFail($project_id);
        $currentLoggedInUser = Auth::user();
        $daily_scrum = new Daily_Scrums();

        $daily_scrum->member_id = $currentLoggedInUser->id;
        $daily_scrum->sprint_id = $sprint_id;
        $daily_scrum->is_doing = request("is_doing");
        $daily_scrum->has_done = request("has_done");
        $daily_scrum->errors = request("errors");
        $daily_scrum->save();

        return redirect()->route("daily_scrums",["project" =>$project_id, "sprint"=>$daily_scrum->sprint_id ]);
         
    }
    public function sprint(Projects $project){
        $sprints = $project->sprints;
        $current_project = $project->id;
    
    	return view('projects.sprint', compact('project', "sprints", "current_project"));
    }

    public function nav_daily_scrums($project_id = null, $sprint_id = null){
        
        $project = Projects::find($project_id);
        $sprint = Sprints::find($sprint_id);
        $sprints = $project->sprints;
        $daily_scrums = $sprint->dailyscrums;
        $current_project = $project->id;

    	return view('projects.daily_scrums', compact("sprints","project","daily_scrums","sprint", "current_project"));
    }
}