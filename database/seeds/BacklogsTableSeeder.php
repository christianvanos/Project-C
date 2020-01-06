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
        $sprint_ids = App\Sprints::pluck('id')->all();

        foreach ($sprint_ids as $id) {
            DB::table('backlogs')->insert([
                'name' => 'Product Backlog',
                'order' => 1,
                'label' => 'todo',
                'is_product_backlog' => True,
                'sprint_id' => App\Sprints::find($id)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('backlogs')->insert([
                'name' => 'Sprint Backlog',
                'order' => 2,
                'label' => 'todo',
                'is_product_backlog' => False,
                'sprint_id' => App\Sprints::find($id)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('backlogs')->insert([
                'name' => 'Doing',
                'order' => 3,
                'label' => 'doing',
                'is_product_backlog' => False,
                'sprint_id' => App\Sprints::find($id)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('backlogs')->insert([
                'name' => 'Done',
                'order' => 4,
                'label' => 'done',
                'is_product_backlog' => False,
                'sprint_id' => App\Sprints::find($id)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
