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
            'member_id' => App\ProjectMembers::find(1)->id,
            'item_id' => App\UserstoryItems::find(1)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_item_members')->insert([
            'id' => 2,
            'member_id' => App\ProjectMembers::find(1)->id,
            'item_id' => App\UserstoryItems::find(2)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_item_members')->insert([
            'id' => 3,
            'member_id' => App\ProjectMembers::find(1)->id,
            'item_id' => App\UserstoryItems::find(3)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_item_members')->insert([
            'id' => 4,
            'member_id' => App\ProjectMembers::find(2)->id,
            'item_id' => App\UserstoryItems::find(4)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_item_members')->insert([
            'id' => 5,
            'member_id' => App\ProjectMembers::find(2)->id,
            'item_id' => App\UserstoryItems::find(5)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('userstory_item_members')->insert([
            'id' => 6,
            'member_id' => App\ProjectMembers::find(2)->id,
            'item_id' => App\UserstoryItems::find(6)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('userstory_item_members')->insert([
            'id' => 7,
            'member_id' => App\ProjectMembers::find(3)->id,
            'item_id' => App\UserstoryItems::find(7)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('userstory_item_members')->insert([
            'id' => 8,
            'member_id' => App\ProjectMembers::find(3)->id,
            'item_id' => App\UserstoryItems::find(8)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('userstory_item_members')->insert([
            'id' => 9,
            'member_id' => App\ProjectMembers::find(4)->id,
            'item_id' => App\UserstoryItems::find(9)->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
