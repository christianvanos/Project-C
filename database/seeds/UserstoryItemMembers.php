<?php

use Illuminate\Database\Seeder;

class UserstoryItemMembers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userstory_item_members')->insert([
            'id' => 1,
            'member_id' => App\Project_Members::find(1)->id,
            'userstory_item_id' => App\Userstory_Items::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_item_members')->insert([
            'id' => 2,
            'member_id' => App\Project_Members::find(1)->id,
            'userstory_item_id' => App\Userstory_Items::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_item_members')->insert([
            'id' => 3,
            'member_id' => App\Project_Members::find(1)->id,
            'userstory_item_id' => App\Userstory_Items::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_item_members')->insert([
            'id' => 4,
            'member_id' => App\Project_Members::find(2)->id,
            'userstory_item_id' => App\Userstory_Items::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_item_members')->insert([
            'id' => 5,
            'member_id' => App\Project_Members::find(2)->id,
            'userstory_item_id' => App\Userstory_Items::find(5)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('userstory_item_members')->insert([
            'id' => 6,
            'member_id' => App\Project_Members::find(2)->id,
            'userstory_item_id' => App\Userstory_Items::find(6)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('userstory_item_members')->insert([
            'id' => 7,
            'member_id' => App\Project_Members::find(3)->id,
            'userstory_item_id' => App\Userstory_Items::find(7)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('userstory_item_members')->insert([
            'id' => 8,
            'member_id' => App\Project_Members::find(3)->id,
            'userstory_item_id' => App\Userstory_Items::find(8)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_item_members')->insert([
            'id' => 9,
            'member_id' => App\Project_Members::find(4)->id,
            'userstory_item_id' => App\Userstory_Items::find(9)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
