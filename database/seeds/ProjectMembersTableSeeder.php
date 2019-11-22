<?php

use Illuminate\Database\Seeder;

class ProjectMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_members')->insert([
            'id' => 1,
            'user_id' => App\User::find(1)->id,
            'project_id' => App\Sprints::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('project_members')->insert([
            'id' => 2,
            'user_id' => App\User::find(2)->id,
            'project_id' => App\Sprints::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('project_members')->insert([
            'id' => 3,
            'user_id' => App\User::find(3)->id,
            'project_id' => App\Sprints::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('project_members')->insert([
            'id' => 4,
            'user_id' => App\User::find(4)->id,
            'project_id' => App\Sprints::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
