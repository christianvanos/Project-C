<?php

use Illuminate\Database\Seeder;

class DailyScrumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sprint_ids = App\Sprints::pluck('id')->all();

        foreach ($sprint_ids as $sprint_id) {
            $project_id = App\Sprints::find($sprint_id)->project_id;
            
            $project_member_no_admin_ids = App\ProjectMembers::join('users', function($join) {
                $join->on('project_members.user_id', '=', 'users.id')
                    ->where('users.type', '!=', 'admin');
            })->where('project_members.project_id', $project_id)->pluck('project_members.id');

            foreach($project_member_no_admin_ids as $member_id) {
                DB::table('daily_scrums')->insert([
                    'is_doing' => 'Mee bezig (dummy text)',
                    'has_done' => 'Gedaan (dummy text)',
                    'errors' => 'Niet gelukt (dummy text)',
                    'sprint_id' => App\Sprints::find($sprint_id)->id,
                    'member_id' => App\ProjectMembers::find($member_id)->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
