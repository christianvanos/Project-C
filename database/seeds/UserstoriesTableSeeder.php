<?php

use Illuminate\Database\Seeder;

class UserstoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userstories')->insert([
            'id' => 1,
            'description' => 'foo bar',
            'acceptance_criteria' => ' foo bar',
            'status' => 'done',
            'projects_id' => App\Projects::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 2,
            'description' => 'foo bar',
            'acceptance_criteria' => ' foo bar',
            'status' => 'testing',
            'projects_id' => App\Projects::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 3,
            'description' => 'foo bar',
            'acceptance_criteria' => ' foo bar',
            'status' => 'doing',
            'projects_id' => App\Projects::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 4,
            'description' => 'foo bar',
            'acceptance_criteria' => ' foo bar',
            'status' => 'done',
            'projects_id' => App\Projects::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 5,
            'description' => 'foo bar',
            'acceptance_criteria' => ' foo bar',
            'status' => 'testing',
            'projects_id' => App\Projects::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 6,
            'description' => 'foo bar',
            'acceptance_criteria' => ' foo bar',
            'status' => 'doing',
            'projects_id' => App\Projects::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 7,
            'description' => 'foo bar',
            'acceptance_criteria' => ' foo bar',
            'status' => 'done',
            'projects_id' => App\Projects::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 8,
            'description' => 'foo bar',
            'acceptance_criteria' => ' foo bar',
            'status' => 'testing',
            'projects_id' => App\Projects::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 9,
            'description' => 'foo bar',
            'acceptance_criteria' => ' foo bar',
            'status' => 'doing',
            'projects_id' => App\Projects::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
