<?php

namespace App\Http\Middleware;

use Closure;
use App\Projects;
use App\Sprints;
use App\Project_Members;

class Project
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $project_id = $request->project_id;
        $sprint_id = $request->sprint_id;

        if (!$project_id) { $project_id = Project_Members::where('user_id', '=', auth()->user()->id)->pluck('projects_id')->first(); }         
        if (!$sprint_id) { $sprint_id = Sprints::where('projects_id', '=', $project_id)->pluck('id')->first(); }

        if ($this->projectAndSprintExists($project_id, $sprint_id) and $this->isMember($project_id)) {
            return $next($request);
        } else {
            abort(404);
        }
    }

    public function isMember($project_id) {
        if (Project_Members::where('projects_id', '=', $project_id)->where('user_id', '=', auth()->user()->id)->first()) {
            return true;
        } 
    }

    public function projectAndSprintExists($project_id, $sprint_id) {
        if ((Projects::find($project_id)) and (Sprints::where('id', '=', $sprint_id)->where('projects_id', '=', $project_id)->first())) {
            return true;
        }
    }
}
