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
        $sprint_ids = App\Sprints::pluck('id');

        foreach ($sprint_ids as $id) {
            DB::table('sprint_meetings')->insert([
                'type' => 'sprint planning',
                'description' => 'Planning (dummy text)',
                'sprint_id' => App\Sprints::find($id)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('sprint_meetings')->insert([
                'type' => 'sprint retro',
                'description' => 'Retro (dummy text)',
                'sprint_id' => App\Sprints::find($id)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('sprint_meetings')->insert([
                'type' => 'sprint review',
                'description' => 'Review (dummy text)',
                'sprint_id' => App\Sprints::find($id)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
