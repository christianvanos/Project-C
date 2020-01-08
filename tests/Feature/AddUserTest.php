<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Hash;

class AddUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function testExample()
    {
        $user = new User;
        $user->name = "Sevven Alias";
        $user->email = "test@gmail.com";
        $user->password = Hash::make('secret');
        $user->email_verified_at = "2020-01-08 19:39:30";
        $user->type = "admin";
        $user->save();

        $this->assertCount(1,User::all());
    }
}
