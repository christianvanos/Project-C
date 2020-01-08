<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class RetrospectiveAccessTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::find(1);

        // check if retrospective index page is linked with the right blade
        $this->actingAS($user)->get('retrospectives?id=1')->assertStatus(200)->assertViewIs('pages.retrospectives');

        // check if retrospective add page is linked with the right blade
        $this->actingAS($user)->get('retrospective/create/2')->assertStatus(200)->assertViewIs('pages.retrospectivecreate');

        // check if retrospective edit page is linked with the right blade
        $this->actingAS($user)->get('retrospective/edit/14')->assertStatus(200)->assertViewIs('pages.retrospectiveedit');
    }
}
