<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'name' => 'Scrumify',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('projects')->insert([
            'name' => 'Genius App',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('projects')->insert([
            'name' => 'Analyse 6',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
