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
        $sprint_meeting_ids = App\SprintMeetings::pluck('id');

        foreach ($sprint_meeting_ids as $sprint_meeting_id) {
            $project_member_ids = App\SprintMeetings::find($sprint_meeting_id)->sprint->project->members->pluck('id');
            
            foreach ($project_member_ids as $project_member_id) {
                DB::table('sprint_meeting_presents')->insert([
                    'member_id' => App\ProjectMembers::find($project_member_id)->id,
                    'meeting_id' => App\SprintMeetings::find($sprint_meeting_id)->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);    
            }
        }

        DB::table('sprint_meeting_presents')->insert([
            'member_id' => App\ProjectMembers::find(1)->id,
            'meeting_id' => App\SprintMeetings::find(1)->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sprint_meeting_presents')->insert([
            'member_id' => App\ProjectMembers::find(2)->id,
            'meeting_id' => App\SprintMeetings::find(1)->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sprint_meeting_presents')->insert([
            'member_id' => App\ProjectMembers::find(3)->id,
            'meeting_id' => App\SprintMeetings::find(1)->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sprint_meeting_presents')->insert([
            'member_id' => App\ProjectMembers::find(4)->id,
            'meeting_id' => App\SprintMeetings::find(1)->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
