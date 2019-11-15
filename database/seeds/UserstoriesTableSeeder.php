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
        DB::table('userstories')->insert([
            'id' => 1,
            'description' => 'Userstorie 1',
            'acceptance_criteria' => ' acceptencriterea die daarbij horen',
            'projects_id' => App\Projects::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 2,
            'description' => 'Userstorie 2',
            'acceptance_criteria' => ' accepentence criterea die daarbij hoort1',
            'projects_id' => App\Projects::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 3,
            'description' => 'Userstorie 3',
            'acceptance_criteria' => ' accepentence criterea die daarbij hoort2',
            'projects_id' => App\Projects::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 4,
            'description' => 'Userstorie 1',
            'acceptance_criteria' => ' accepentence criterea die daarbij hoort',
            'projects_id' => App\Projects::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 5,
            'description' => 'Userstorie 2',
            'acceptance_criteria' => ' accepentence criterea die daarbij hoort',
            'projects_id' => App\Projects::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 6,
            'description' => 'Userstorie 3',
            'acceptance_criteria' => ' accepentence criterea die daarbij hoort',
            'projects_id' => App\Projects::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 7,
            'description' => 'Userstorie 1',
            'acceptance_criteria' => ' accepentence criterea die daarbij hoort',
            'projects_id' => App\Projects::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 8,
            'description' => 'Userstorie 2',
            'acceptance_criteria' => ' accepentence criterea die daarbij hoort',
            'projects_id' => App\Projects::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstories')->insert([
            'id' => 9,
            'description' => 'Userstorie 3',
            'acceptance_criteria' => ' accepentence criterea die daarbij hoort',
            'projects_id' => App\Projects::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
