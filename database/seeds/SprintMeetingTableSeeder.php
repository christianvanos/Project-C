<?php

use Illuminate\Database\Seeder;

class SprintMeetingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sprint_meeting')->insert([
            'id' => 1,
            'type' => 'daily scrum',
            'description' => 'foo bar',
            'sprints_id' => App\Sprints::find(1)->id,
            'present_id' => App\Sprint_Meeting_Present::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 2,
            'type' => 'daily scrum',
            'description' => 'foo bar',
            'sprints_id' => App\Sprints::find(2)->id,
            'present_id' => App\Sprint_Meeting_Present::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 3,
            'type' => 'daily scrum',
            'description' => 'foo bar',
            'sprints_id' => App\Sprints::find(3)->id,
            'present_id' => App\Sprint_Meeting_Present::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 4,
            'type' => 'daily scrum',
            'description' => 'foo bar',
            'sprints_id' => App\Sprints::find(4)->id,
            'present_id' => App\Sprint_Meeting_Present::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 5,
            'type' => 'daily scrum',
            'description' => 'foo bar',
            'sprints_id' => App\Sprints::find(5)->id,
            'present_id' => App\Sprint_Meeting_Present::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 6,
            'type' => 'daily scrum',
            'description' => 'foo bar',
            'sprints_id' => App\Sprints::find(6)->id,
            'present_id' => App\Sprint_Meeting_Present::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 7,
            'type' => 'daily scrum',
            'description' => 'foo bar',
            'sprints_id' => App\Sprints::find(7)->id,
            'present_id' => App\Sprint_Meeting_Present::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 8,
            'type' => 'daily scrum',
            'description' => 'foo bar',
            'sprints_id' => App\Sprints::find(8)->id,
            'present_id' => App\Sprint_Meeting_Present::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 9,
            'type' => 'daily scrum',
            'description' => 'foo bar',
            'sprints_id' => App\Sprints::find(9)->id,
            'present_id' => App\Sprint_Meeting_Present::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
