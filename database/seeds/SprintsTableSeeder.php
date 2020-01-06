<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
                'start_date' => Carbon::now()->subDays(45),
                'end_date' => Carbon::now()->subDays(31),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('sprints')->insert([
                'number' => 2,
                'project_id' => App\Projects::find($id)->id,
                'start_date' => Carbon::now()->subDays(31),
                'end_date' => Carbon::now()->subDays(17),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('sprints')->insert([
                'number' => 3,
                'project_id' => App\Projects::find($id)->id,
                'start_date' => Carbon::now()->subDays(17),
                'end_date' => Carbon::now()->subDays(3),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('sprints')->insert([
                'number' => 4,
                'project_id' => App\Projects::find($id)->id,
                'start_date' => Carbon::now()->subDays(3),
                'end_date' => Carbon::now()->addDays(11),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
