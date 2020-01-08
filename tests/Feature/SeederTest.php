<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Userstories;
use App\Projects;
use App\Backlogs;
use App\DailyScrums;
use App\SprintMeetings;
use App\ItemHistory;
use App\Sprints;
use App\ProjectMembers;

class SeederTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertEquals(4, User::count());
        $this->assertEquals(3, Userstories::count());
        $this->assertEquals(3, Projects::count());
        $this->assertEquals(48, Backlogs::count());
        $this->assertEquals(12, DailyScrums::count());
        $this->assertEquals(36, SprintMeetings::count());
        $this->assertEquals(12, ItemHistory::count());
        $this->assertEquals(12, DailyScrums::count());
        $this->assertEquals(12, Sprints::count());
        $this->assertEquals(6, ProjectMembers::count());
    }
}
