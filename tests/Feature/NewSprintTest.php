<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Sprints;
use App\Projects;

class NewSprintTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function testExample()
    {
        $project = new Projects;
        $project->name = "Scrumify";
        $project->save();

        // new sprint use the project created above
        $response = new Sprints;
        $response->project_id = $project->id;
        $response->number = 5;
        $response->start_date = "2020-01-20";
        $response->end_date = "2020-01-27";
        $response->save();

        $this->assertCount(1,Sprints::all());
    }
}
