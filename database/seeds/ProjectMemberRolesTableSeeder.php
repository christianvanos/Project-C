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
        $project_member_no_admin_ids = App\ProjectMembers::join('users', function($join) {
            $join->on('project_members.user_id', '=', 'users.id')
                ->where('users.type', '!=', 'admin');
        })->pluck('project_members.id');

        foreach ($project_member_no_admin_ids as $id) {
            DB::table('project_member_roles')->insert([
                'role' => 'Scrum Master',
                'member_id' => App\ProjectMembers::find($id)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
