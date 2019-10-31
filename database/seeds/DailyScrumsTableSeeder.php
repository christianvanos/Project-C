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
        DB::table('daily_scrums')->insert([
            'id' => 1,
            'is_doing' => 'Foo',
            'has_done' => 'Bar',
            'errors' => 'Foo bar',
            'sprints_id' => App\Sprints::find(1)->id,
            'members_id' => App\Project_Members::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 2,
            'is_doing' => 'Foo',
            'has_done' => 'Bar',
            'errors' => 'Foo bar',
            'sprints_id' => App\Sprints::find(2)->id,
            'members_id' => App\Project_Members::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 3,
            'is_doing' => 'Foo',
            'has_done' => 'Bar',
            'errors' => 'Foo bar',
            'sprints_id' => App\Sprints::find(3)->id,
            'members_id' => App\Project_Members::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 4,
            'is_doing' => 'Foo',
            'has_done' => 'Bar',
            'errors' => 'Foo bar',
            'sprints_id' => App\Sprints::find(4)->id,
            'members_id' => App\Project_Members::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 5,
            'is_doing' => 'Foo',
            'has_done' => 'Bar',
            'errors' => 'Foo bar',
            'sprints_id' => App\Sprints::find(5)->id,
            'members_id' => App\Project_Members::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 6,
            'is_doing' => 'Foo',
            'has_done' => 'Bar',
            'errors' => 'Foo bar',
            'sprints_id' => App\Sprints::find(6)->id,
            'members_id' => App\Project_Members::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 7,
            'is_doing' => 'Foo',
            'has_done' => 'Bar',
            'errors' => 'Foo bar',
            'sprints_id' => App\Sprints::find(7)->id,
            'members_id' => App\Project_Members::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 8,
            'is_doing' => 'Foo',
            'has_done' => 'Bar',
            'errors' => 'Foo bar',
            'sprints_id' => App\Sprints::find(8)->id,
            'members_id' => App\Project_Members::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 9,
            'is_doing' => 'Foo',
            'has_done' => 'Bar',
            'errors' => 'Foo bar',
            'sprints_id' => App\Sprints::find(9)->id,
            'members_id' => App\Project_Members::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 10,
            'is_doing' => 'Foo',
            'has_done' => 'Bar',
            'errors' => 'Foo bar',
            'sprints_id' => App\Sprints::find(7)->id,
            'members_id' => App\Project_Members::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 11,
            'is_doing' => 'Foo',
            'has_done' => 'Bar',
            'errors' => 'Foo bar',
            'sprints_id' => App\Sprints::find(8)->id,
            'members_id' => App\Project_Members::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 12,
            'is_doing' => 'Foo',
            'has_done' => 'Bar',
            'errors' => 'Foo bar',
            'sprints_id' => App\Sprints::find(9)->id,
            'members_id' => App\Project_Members::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
