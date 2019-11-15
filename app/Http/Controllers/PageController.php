<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Userstory_Items;
use App\Sprints;
use App\Project_Members;
use App\Projects;
use App\Userstories;

class PageController extends Controller
{
    public function scrumboard($project_id = null, $sprint_id = null) 
    {
        if (!$project_id) { $project_id = Project_Members::where('user_id', '=', auth()->user()->id)->pluck('projects_id')->first(); }         
        if (!$sprint_id) { $sprint_id = Sprints::where('projects_id', '=', $project_id)->pluck('id')->first(); }

        $backlogs = \App\Backlogs::where('sprints_id', $sprint_id)->orderBy('order')->get();
        $userstory_items = Userstory_Items::whereIn('backlog_id', $backlogs->pluck('id'))->get();

        $project = Projects::find($project_id);
        $sprint = Sprints::find($sprint_id);
        $all_sprints = Sprints::where('projects_id', '=', $project_id)->get();
        $all_userstories = Userstories::where('projects_id', '=', $project_id)->get();

        return view('pages.scrumboard', 
                    ['backlogs' => $backlogs, 
                    'userstory_items' => $userstory_items, 
                    "project" => $project, 
                    "current_sprint" => $sprint,
                    "all_sprints" => $all_sprints,
                    "userstories" => $all_userstories]);
    }

    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function icons()
    {
        return view('pages.icons');
    }

    public function userprojects() 
    {
        return view('userprojects.userprojects');
    }

    public function charts() 
    {
        return view('userprojects.charts');
    }

    /**
     * Display maps page
     *
     * @return \Illuminate\View\View
     */
    public function maps()
    {
        return view('pages.maps');
    }

    /**
     * Display tables page
     *
     * @return \Illuminate\View\View
     */
    public function tables()
    {
        return view('pages.tables');
    }

    /**
     * Display notifications page
     *
     * @return \Illuminate\View\View
     */
    public function notifications()
    {
        return view('pages.notifications');
    }

    /**
     * Display rtl page
     *
     * @return \Illuminate\View\View
     */
    public function rtl()
    {
        return view('pages.rtl');
    }

    /**
     * Display typography page
     *
     * @return \Illuminate\View\View
     */
    public function typography()
    {
        return view('pages.typography');
    }

    /**
     * Display upgrade page
     *
     * @return \Illuminate\View\View
     */
    public function upgrade()
    {
        return view('pages.upgrade');
    }
}
