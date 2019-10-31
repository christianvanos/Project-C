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
            'id' => 1,
            'name' => 'Scrumify',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('projects')->insert([
            'id' => 2,
            'name' => 'Genius App',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('projects')->insert([
            'id' => 3,
            'name' => 'Fooo',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
