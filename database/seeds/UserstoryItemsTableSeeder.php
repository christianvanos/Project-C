<?php

use Illuminate\Database\Seeder;

class UserstoryItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userstory_items')->insert([
            'id' => 1,
            'description' => 'doing',
            'moscow' => 'Must Have',
            'status' => 'Doing',
            'definition_of_done' => 'bar',
            'story_points' => 4,
            'backlog_id' => App\Backlogs::find(2)->id,
            'userstory_id' => App\Userstories::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_items')->insert([
            'id' => 2,
            'description' => 'foo bar',
            'moscow' => 'Must Have',
            'status' => 'Testing',
            'definition_of_done' => 'bar',
            'story_points' => 4,
            'backlog_id' => App\Backlogs::find(3)->id,
            'userstory_id' => App\Userstories::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_items')->insert([
            'id' => 3,
            'description' => 'foo bar',
            'moscow' => 'Must Have',
            'status' => 'Done',
            'definition_of_done' => 'bar',
            'story_points' => 4,
            'backlog_id' => App\Backlogs::find(4)->id,
            'userstory_id' => App\Userstories::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_items')->insert([
            'id' => 4,
            'description' => 'doing',
            'moscow' => 'Must Have',
            'status' => 'Doing',
            'definition_of_done' => 'bar',
            'story_points' => 4,
            'backlog_id' => App\Backlogs::find(6)->id,
            'userstory_id' => App\Userstories::find(6)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_items')->insert([
            'id' => 5,
            'description' => 'foo bar',
            'moscow' => 'Must Have',
            'status' => 'Testing',
            'definition_of_done' => 'bar',
            'story_points' => 4,
            'backlog_id' => App\Backlogs::find(7)->id,
            'userstory_id' => App\Userstories::find(5)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_items')->insert([
            'id' => 6,
            'description' => 'foo bar',
            'moscow' => 'Must Have',
            'status' => 'Done',
            'definition_of_done' => 'bar',
            'story_points' => 4,
            'backlog_id' => App\Backlogs::find(8)->id,
            'userstory_id' => App\Userstories::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_items')->insert([
            'id' => 7,
            'description' => 'doing',
            'moscow' => 'Must Have',
            'status' => 'Doing',
            'definition_of_done' => 'bar',
            'story_points' => 4,
            'backlog_id' => App\Backlogs::find(10)->id,
            'userstory_id' => App\Userstories::find(9)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_items')->insert([
            'id' => 8,
            'description' => 'foo bar',
            'moscow' => 'Must Have',
            'status' => 'Testing',
            'definition_of_done' => 'bar',
            'story_points' => 4,
            'backlog_id' => App\Backlogs::find(11)->id,
            'userstory_id' => App\Userstories::find(8)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_items')->insert([
            'id' => 9,
            'description' => 'foo bar',
            'moscow' => 'Must Have',
            'status' => 'Done',
            'definition_of_done' => 'bar',
            'story_points' => 4,
            'backlog_id' => App\Backlogs::find(12)->id,
            'userstory_id' => App\Userstories::find(7)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
