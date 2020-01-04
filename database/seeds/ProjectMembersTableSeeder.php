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
        $project_ids = App\Projects::pluck('id')->all();
        $admin_ids = App\User::where('type', 'admin')->pluck('id')->all();
        $non_admin_ids = App\User::where('type', 'default')->pluck('id')->all();
        shuffle($non_admin_ids);
        $amount_projects = count($project_ids);
        $current_project = 1;
        
        foreach ($project_ids as $project_id) {
            foreach ($admin_ids as $admin_id) {
                DB::table('project_members')->insert([
                    'user_id' => App\User::find($admin_id)->id,
                    'project_id' => App\Projects::find($project_id)->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        foreach ($project_ids as $project_id) {
            if ($current_project == 1) {
                $id = $non_admin_ids[array_rand($non_admin_ids)];
                DB::table('project_members')->insert([
                    'user_id' => App\User::find($id)->id,
                    'project_id' => App\Projects::find($project_id)->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } elseif ($current_project == $amount_projects) {
                $id = $non_admin_ids[array_rand($non_admin_ids)];
                DB::table('project_members')->insert([
                    'user_id' => App\User::find($id)->id,
                    'project_id' => App\Projects::find($project_id)->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                $id = $non_admin_ids[array_rand($non_admin_ids)];
                DB::table('project_members')->insert([
                    'user_id' => App\User::find($id)->id,
                    'project_id' => App\Projects::find($project_id)->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $current_project += 1;
        }
    }
}
