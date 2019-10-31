<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Projects;
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
    public function edit($id){
    	
    	$project = Projects::findOrFail($id);
    	return view('projects.edit', compact('project'));
    }
    public function update($id){
    	$project = Projects::findOrFail($id);
    	$project->name = request('title');
    	$project->save();
    	return redirect("/projects");
    }
    public function destroy($id){
    	Projects::findOrFail($id)->delete();
    	return redirect("/projects");
    }
    	
}