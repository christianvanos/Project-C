<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            ProjectsTableSeeder::class,
            SprintsTableSeeder::class,
            BacklogsTableSeeder::class,
            ProjectMembersTableSeeder::class,
            DailyScrumsTableSeeder::class,
            ProjectMembersRolesTableSeeder::class,
            UserstoriesTableSeeder::class,
            UserstoryItemsTableSeeder::class,
            UserstoryItemMembers::class,
            SprintMeetingPresentTableSeeder::class,
            SprintMeetingTableSeeder::class,
        ]);
    }
}
