<?php

use Illuminate\Database\Seeder;

class BacklogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('backlogs')->insert([
            'id' => 1,
            'name' => 'Sprint Backlog',
            'sprint_id' => App\Sprints::find(1)->id,
            'created_at' => now(),
            'order' => 1,
            'label' => 'todo',
            'is_product_backlog' => False,
            'updated_at' => now()
        ]);
        DB::table('backlogs')->insert([
            'id' => 2,
            'name' => 'Doing',
            'sprint_id' => App\Sprints::find(1)->id,
            'created_at' => now(),
            'order' => 2,
            'label' => 'doing',
            'is_product_backlog' => False,
            'updated_at' => now()
        ]);
        DB::table('backlogs')->insert([
            'id' => 3,
            'name' => 'Testing',
            'sprint_id' => App\Sprints::find(1)->id,
            'created_at' => now(),
            'order' => 3,
            'label' => 'doing',
            'is_product_backlog' => False,
            'updated_at' => now()
        ]);
        DB::table('backlogs')->insert([
            'id' => 4,
            'name' => 'Done',
            'sprint_id' => App\Sprints::find(1)->id,
            'created_at' => now(),
            'order' => 4,
            'label' => 'done',
            'is_product_backlog' => False,
            'updated_at' => now()
        ]);

        DB::table('backlogs')->insert([
            'id' => 5,
            'name' => 'Sprint Backlog',
            'sprint_id' => App\Sprints::find(2)->id,
            'created_at' => now(),
            'order' => 1,
            'label' => 'todo',
            'is_product_backlog' => False,
            'updated_at' => now()
        ]);
        DB::table('backlogs')->insert([
            'id' => 6,
            'name' => 'Doing',
            'sprint_id' => App\Sprints::find(2)->id,
            'created_at' => now(),
            'order' => 2,
            'label' => 'doing',
            'is_product_backlog' => False,
            'updated_at' => now()
        ]);
        DB::table('backlogs')->insert([
            'id' => 7,
            'name' => 'Testing',
            'sprint_id' => App\Sprints::find(2)->id,
            'created_at' => now(),
            'order' => 3,
            'label' => 'doing',
            'is_product_backlog' => False,
            'updated_at' => now()
            
        ]);
        DB::table('backlogs')->insert([
            'id' => 8,
            'name' => 'Done',
            'sprint_id' => App\Sprints::find(2)->id,
            'created_at' => now(),
            'order' => 4,
            'label' => 'done',
            'is_product_backlog' => False,
            'updated_at' => now()
        ]);

        DB::table('backlogs')->insert([
            'id' => 9,
            'name' => 'Sprint Backlog',
            'sprint_id' => App\Sprints::find(3)->id,
            'created_at' => now(),
            'order' => 1,
            'label' => 'todo',
            'is_product_backlog' => False,
            'updated_at' => now()
        ]);
        DB::table('backlogs')->insert([
            'id' => 10,
            'name' => 'Doing',
            'sprint_id' => App\Sprints::find(3)->id,
            'created_at' => now(),
            'order' => 2,
            'label' => 'doing',
            'is_product_backlog' => False,
            'updated_at' => now()
        ]);
        DB::table('backlogs')->insert([
            'id' => 11,
            'name' => 'Testing',
            'sprint_id' => App\Sprints::find(3)->id,
            'created_at' => now(),
            'order' => 3,
            'label' => 'doing',
            'is_product_backlog' => False,
            'updated_at' => now()
        ]);
        DB::table('backlogs')->insert([
            'id' => 12,
            'name' => 'Done',
            'is_product_backlog' => False,
            'order' => 4,
            'label' => 'done',
            'sprint_id' => App\Sprints::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('backlogs')->insert([
            'id' => 13,
            'name' => 'Product Backlog',
            'is_product_backlog' => True,
            'order' => 0.5,
            'label' => 'todo',
            'sprint_id' => App\Sprints::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('backlogs')->insert([
            'id' => 14,
            'name' => 'Product Backlog',
            'is_product_backlog' => True,
            'order' => 0.5,
            'label' => 'todo',
            'sprint_id' => App\Sprints::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('backlogs')->insert([
            'id' => 15,
            'name' => 'Product Backlog',
            'order' => 0.5,
            'label' => 'todo',
            'is_product_backlog' => True,
            'sprint_id' => App\Sprints::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
