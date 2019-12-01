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
        DB::table('project_member_roles')->insert([
            'id' => 1,
            'role' => 'Scrum Master',
            'member_id' => App\ProjectMembers::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('project_member_roles')->insert([
            'id' => 2,
            'role' => 'Developer',
            'member_id' => App\ProjectMembers::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('project_member_roles')->insert([
            'id' => 3,
            'role' => 'Scrum Master',
            'member_id' => App\ProjectMembers::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('project_member_roles')->insert([
            'id' => 4,
            'role' => 'Developer',
            'member_id' => App\ProjectMembers::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
