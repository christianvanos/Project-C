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
        DB::table('sprint_meeting_presents')->insert([
            'id' => 1,
            'member_id' => App\ProjectMembers::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting_presents')->insert([
            'id' => 2,
            'member_id' => App\ProjectMembers::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting_presents')->insert([
            'id' => 3,
            'member_id' => App\ProjectMembers::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting_presents')->insert([
            'id' => 4,
            'member_id' => App\ProjectMembers::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
