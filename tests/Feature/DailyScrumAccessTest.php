<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class DailyScrumAccessTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::find(1);

        // check if daily scrum index page is linked with the right blade
        $this->actingAS($user)->get('projects/2/5/daily_scrums')->assertStatus(200)->assertViewIs('projects.daily_scrums');

        // check if daily scrum add page is linked with the right blade
        $this->actingAS($user)->get('/projects/2/dScrums')->assertStatus(200)->assertViewIs('projects.dScrums');

    }
}
