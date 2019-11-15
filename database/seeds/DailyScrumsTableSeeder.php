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
            'is_doing' => 'HTML',
            'has_done' => 'CSS',
            'errors' => 'Geen fouten',
            'sprints_id' => App\Sprints::find(1)->id,
            'members_id' => App\Project_Members::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 2,
            'is_doing' => 'PHP',
            'has_done' => 'SQL',
            'errors' => 'error 404',
            'sprints_id' => App\Sprints::find(2)->id,
            'members_id' => App\Project_Members::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 3,
            'is_doing' => 'JavaScript',
            'has_done' => 'Jquery',
            'errors' => 'ERROR 403',
            'sprints_id' => App\Sprints::find(3)->id,
            'members_id' => App\Project_Members::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 4,
            'is_doing' => 'Process',
            'has_done' => 'Product',
            'errors' => 'Excel error',
            'sprints_id' => App\Sprints::find(4)->id,
            'members_id' => App\Project_Members::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 5,
            'is_doing' => 'Styling',
            'has_done' => 'Backend',
            'errors' => 'Geen errors',
            'sprints_id' => App\Sprints::find(5)->id,
            'members_id' => App\Project_Members::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 6,
            'is_doing' => 'Login',
            'has_done' => 'Registreer',
            'errors' => 'So far so good',
            'sprints_id' => App\Sprints::find(6)->id,
            'members_id' => App\Project_Members::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 7,
            'is_doing' => 'Language',
            'has_done' => 'Dutch',
            'errors' => 'Italian',
            'sprints_id' => App\Sprints::find(7)->id,
            'members_id' => App\Project_Members::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 8,
            'is_doing' => 'Change password',
            'has_done' => 'Change username',
            'errors' => 'None',
            'sprints_id' => App\Sprints::find(8)->id,
            'members_id' => App\Project_Members::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 9,
            'is_doing' => 'compatablity',
            'has_done' => 'server setup',
            'errors' => 'webhosting',
            'sprints_id' => App\Sprints::find(9)->id,
            'members_id' => App\Project_Members::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 10,
            'is_doing' => 'Creating daily scrums',
            'has_done' => 'Made 9 of them',
            'errors' => 'Nope',
            'sprints_id' => App\Sprints::find(7)->id,
            'members_id' => App\Project_Members::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 11,
            'is_doing' => 'Finishing',
            'has_done' => 'A lot',
            'errors' => 'No',
            'sprints_id' => App\Sprints::find(8)->id,
            'members_id' => App\Project_Members::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('daily_scrums')->insert([
            'id' => 12,
            'is_doing' => 'Laravel',
            'has_done' => 'Tutorials',
            'errors' => 'Geen fouten',
            'sprints_id' => App\Sprints::find(9)->id,
            'members_id' => App\Project_Members::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
