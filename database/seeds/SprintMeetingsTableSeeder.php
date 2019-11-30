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
        DB::table('sprint_meetings')->insert([
            'id' => 1,
            'type' => 'sprint planning',
            'description' => 'Weinig beloven veel doen',
            'sprint_id' => App\Sprints::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meetings')->insert([
            'id' => 2,
            'type' => 'sprint retro',
            'description' => 'Betere communicatie',
            'sprint_id' => App\Sprints::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meetings')->insert([
            'id' => 3,
            'type' => 'sprint planning',
            'description' => 'Alles combineeren',
            'sprint_id' => App\Sprints::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meetings')->insert([
            'id' => 4,
            'type' => 'sprint review',
            'description' => 'Meer complexiteit',
            'sprint_id' => App\Sprints::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meetings')->insert([
            'id' => 5,
            'type' => 'sprint planning',
            'description' => 'Meer complexiteit toevoegen',
            'sprint_id' => App\Sprints::find(5)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meetings')->insert([
            'id' => 6,
            'type' => 'sprint retro',
            'description' => 'Sneler opelkaar reageren',
            'sprint_id' => App\Sprints::find(6)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meetings')->insert([
            'id' => 7,
            'type' => 'sprint review',
            'description' => 'Nog meer complexiteit',
            'sprint_id' => App\Sprints::find(7)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meetings')->insert([
            'id' => 8,
            'type' => 'sprint retro',
            'description' => 'Meer samenwerken',
            'sprint_id' => App\Sprints::find(8)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprint_meetings')->insert([
            'id' => 9,
            'type' => 'sprint review',
            'description' => 'Even centraal graag::: meer complexiteit mannen',
            'sprint_id' => App\Sprints::find(9)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
