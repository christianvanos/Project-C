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
        $userstory_item_ids = App\UserstoryItems::pluck('id');

        foreach ($userstory_item_ids as $userstory_item_id) {
            $project_member = App\UserstoryItems::find($userstory_item_id)->userstory->project->members->random();
            DB::table('userstory_item_members')->insert([
                'item_id' => App\UserstoryItems::find($userstory_item_id)->id,
                'member_id' => App\ProjectMembers::find($project_member->id)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
