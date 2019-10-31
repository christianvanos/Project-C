<?php

use Illuminate\Database\Seeder;

class Sprints_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sprints')->insert([
            'id' => 1,
            'number' => 1,
            'projects_id' => App\Projects::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprints')->insert([
            'id' => 2,
            'number' => 2,
            'projects_id' => App\Projects::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprints')->insert([
            'id' => 3,
            'number' => 3,
            'projects_id' => App\Projects::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sprints')->insert([
            'id' => 4,
            'number' => 1,
            'projects_id' => App\Projects::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprints')->insert([
            'id' => 5,
            'number' => 2,
            'projects_id' => App\Projects::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprints')->insert([
            'id' => 6,
            'number' => 3,
            'projects_id' => App\Projects::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sprints')->insert([
            'id' => 7,
            'number' => 1,
            'projects_id' => App\Projects::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprints')->insert([
            'id' => 8,
            'number' => 2,
            'projects_id' => App\Projects::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('sprints')->insert([
            'id' => 9,
            'number' => 3,
            'projects_id' => App\Projects::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
