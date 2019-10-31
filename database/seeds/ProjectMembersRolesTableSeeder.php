<?php

use Illuminate\Database\Seeder;

class ProjectMembersRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_members_roles')->insert([
            'id' => 1,
            'role' => 'Scrum Master',
            'member_id' => App\Project_Members::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('project_members_roles')->insert([
            'id' => 2,
            'role' => 'Developer',
            'member_id' => App\Project_Members::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('project_members_roles')->insert([
            'id' => 3,
            'role' => 'Scrum Master',
            'member_id' => App\Project_Members::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('project_members_roles')->insert([
            'id' => 4,
            'role' => 'Developer',
            'member_id' => App\Project_Members::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
