<?php

namespace App\Http\Middleware;

use Closure;
use App\Projects;
use App\Sprints;
use App\ProjectMembers;

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

        if (!$project_id) { $project_id = ProjectMembers::where('user_id', '=', auth()->user()->id)->pluck('project_id')->first(); }         
        if (!$sprint_id) { $sprint_id = Sprints::where('project_id', '=', $project_id)->pluck('id')->first(); }

        if ($this->projectAndSprintExists($project_id, $sprint_id) and $this->isMember($project_id)) {
            return $next($request);
        } else {
            abort(403);
        }
    }

    public function isMember($project_id) {
        if (ProjectMembers::where('project_id', '=', $project_id)->where('user_id', '=', auth()->user()->id)->first()) {
            return true;
        } 
    }

    public function projectAndSprintExists($project_id, $sprint_id) {
        if ((Projects::find($project_id)) and (Sprints::where('id', '=', $sprint_id)->where('project_id', '=', $project_id)->first())) {
            return true;
        }
    }
}
