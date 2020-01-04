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
        $project_ids = App\Projects::pluck('id');

        foreach($project_ids as $id) {
            DB::table('userstories')->insert([
                'description' => 'Userstorie (dummy text)',
                'acceptance_criteria' => ' acceptence criterea die daarbij horen',
                'project_id' => App\Projects::find($id)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
