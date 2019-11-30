<?php

namespace App\Http\Middleware;

use Closure;
use App\Backlogs;

class Backlog
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
        $sprint_id = $request->sprint_id;
        $backlog_id = $request->backlog_id;
        
        if (Backlogs::where('sprint_id', $sprint_id)->where('id', $backlog_id)->first()) {
            return $next($request);
        } else {
            abort(404);
        }
    }
}
