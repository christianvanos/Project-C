<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Project_Members;

class ProjectMembersController extends Controller
{
    public function index()
    {
        $project_members = Project_Members::all();
    	return view('userprojects.index', compact('project_members'));
    }

    public function create()
    {
        return view('userprojects.userprojects');
    }

    public function store(Request $request)
    {
        $Project_Member = new project_members;
        $project_member->user_id = request('user_id');
        $project_member->save();
        $project_member->projects_id = request('projects_id');
        $project_member->save();
        return redirect("/userprojects");
    }

    public function edit($id)
    {
        $Project_Member = Project_Members::findOrFail($id);
    	return view('userprojects.edit', compact('Project_Member'));
    }

    public function update(Request $request, $id)
    {
        $project_Member = Project_Members::findOrFail($id);
        $project_Member->user_id = request('user_id');
        $project_Member->projects_id = request('projects_id');
    	$project_Member->save();
    	return redirect("/userprojects");
    }

    public function destroy($id)
    {
        Project_Members::findOrFail($id)->delete();
    	return redirect("/userprojects");
    }
}
