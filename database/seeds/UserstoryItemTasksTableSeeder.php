<?php

use Illuminate\Database\Seeder;

class UserstoryItemTasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userstory_item_tasks')->insert([
            'id' => 1,
            'description' => 'foo bar',
            'status' => 'Doing',
            'member_id' => App\Project_Members::find(1)->id,
            'userstory_item_id' => App\Userstory_Items::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_item_tasks')->insert([
            'id' => 2,
            'description' => 'foo bar',
            'status' => 'Testing',
            'member_id' => App\Project_Members::find(1)->id,
            'userstory_item_id' => App\Userstory_Items::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_item_tasks')->insert([
            'id' => 3,
            'description' => 'foo bar',
            'status' => 'Done',
            'member_id' => App\Project_Members::find(1)->id,
            'userstory_item_id' => App\Userstory_Items::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_item_tasks')->insert([
            'id' => 4,
            'description' => 'foo bar',
            'status' => 'Doing',
            'member_id' => App\Project_Members::find(2)->id,
            'userstory_item_id' => App\Userstory_Items::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_item_tasks')->insert([
            'id' => 5,
            'description' => 'foo bar',
            'status' => 'Testing',
            'member_id' => App\Project_Members::find(2)->id,
            'userstory_item_id' => App\Userstory_Items::find(5)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('userstory_item_tasks')->insert([
            'id' => 6,
            'description' => 'foo bar',
            'status' => 'Done',
            'member_id' => App\Project_Members::find(2)->id,
            'userstory_item_id' => App\Userstory_Items::find(6)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('userstory_item_tasks')->insert([
            'id' => 7,
            'description' => 'foo bar',
            'status' => 'Doing',
            'member_id' => App\Project_Members::find(3)->id,
            'userstory_item_id' => App\Userstory_Items::find(7)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('userstory_item_tasks')->insert([
            'id' => 8,
            'description' => 'foo bar',
            'status' => 'Testing',
            'member_id' => App\Project_Members::find(3)->id,
            'userstory_item_id' => App\Userstory_Items::find(8)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_item_tasks')->insert([
            'id' => 9,
            'description' => 'foo bar',
            'status' => 'Done',
            'member_id' => App\Project_Members::find(4)->id,
            'userstory_item_id' => App\Userstory_Items::find(9)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
