<?php

use Illuminate\Database\Seeder;

class SprintMeetingPresentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sprint_meeting_present')->insert([
            'id' => 1,
            'members_id' => App\Project_members::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting_present')->insert([
            'id' => 2,
            'members_id' => App\Project_members::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting_present')->insert([
            'id' => 3,
            'members_id' => App\Project_members::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting_present')->insert([
            'id' => 4,
            'members_id' => App\Project_members::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
