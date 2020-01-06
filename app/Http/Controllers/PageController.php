<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Userstory_Items;
use App\Sprints;
use App\Backlogs;
use App\Project_Members;
use App\Projects;
use App\Userstories;

class PageController extends Controller
{
    

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

    public function scruminfo() 
    {
        return view('userprojects.scruminfo');
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
