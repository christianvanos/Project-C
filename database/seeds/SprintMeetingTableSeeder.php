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
            'type' => 'sprint planning',
            'description' => 'Weinig beloven veel doen',
            'sprints_id' => App\Sprints::find(1)->id,
            'present_id' => App\Sprint_Meeting_Present::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 2,
            'type' => 'sprint retro',
            'description' => 'Betere communicatie',
            'sprints_id' => App\Sprints::find(2)->id,
            'present_id' => App\Sprint_Meeting_Present::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 3,
            'type' => 'sprint planning',
            'description' => 'Alles combineeren',
            'sprints_id' => App\Sprints::find(3)->id,
            'present_id' => App\Sprint_Meeting_Present::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 4,
            'type' => 'sprint review',
            'description' => 'Meer complexiteit',
            'sprints_id' => App\Sprints::find(4)->id,
            'present_id' => App\Sprint_Meeting_Present::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 5,
            'type' => 'sprint planning',
            'description' => 'Meer complexiteit toevoegen',
            'sprints_id' => App\Sprints::find(5)->id,
            'present_id' => App\Sprint_Meeting_Present::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 6,
            'type' => 'sprint retro',
            'description' => 'Sneler opelkaar reageren',
            'sprints_id' => App\Sprints::find(6)->id,
            'present_id' => App\Sprint_Meeting_Present::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 7,
            'type' => 'sprint review',
            'description' => 'Nog meer complexiteit',
            'sprints_id' => App\Sprints::find(7)->id,
            'present_id' => App\Sprint_Meeting_Present::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 8,
            'type' => 'sprint retro',
            'description' => 'Meer samenwerken',
            'sprints_id' => App\Sprints::find(8)->id,
            'present_id' => App\Sprint_Meeting_Present::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meeting')->insert([
            'id' => 9,
            'type' => 'sprint review',
            'description' => 'Even centraal graag::: meer complexiteit mannen',
            'sprints_id' => App\Sprints::find(9)->id,
            'present_id' => App\Sprint_Meeting_Present::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
