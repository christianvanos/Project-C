<?php

use Illuminate\Database\Seeder;

class SprintsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project_ids = App\Projects::pluck('id')->all();

        foreach ($project_ids as $id) {
            DB::table('sprints')->insert([
                'number' => 1,
                'project_id' => App\Projects::find($id)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('sprints')->insert([
                'number' => 2,
                'project_id' => App\Projects::find($id)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('sprints')->insert([
                'number' => 3,
                'project_id' => App\Projects::find($id)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('sprints')->insert([
                'number' => 4,
                'project_id' => App\Projects::find($id)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
