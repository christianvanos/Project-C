<?php

use Illuminate\Database\Seeder;
use App\ItemHistory;
use App\Sprints;
use App\UserstoryItems;
use Carbon\Carbon;

class UserstoryItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $backlog_ids = App\Backlogs::pluck('id');

        foreach ($backlog_ids as $backlog_id) {
            $project_id = App\Backlogs::find($backlog_id)->sprint->project->id;
            $userstory_ids = App\Userstories::where('project_id', $project_id)->pluck('id');
            $backlog = App\Backlogs::find($backlog_id);

            foreach ($userstory_ids as $userstory_id) {
                $item_id = DB::table('userstory_items')->insertGetId([
                    'description' => '(dummy text)',
                    'moscow' => 'Must Have',
                    'definition_of_done' => 'Defenition of done (dummy text)',
                    'story_points' => 4,
                    'backlog_id' => App\Backlogs::find($backlog_id)->id,
                    'userstory_id' => App\Userstories::find($userstory_id)->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                
                $today = ItemHistory::whereDate('created_at', Carbon::today())->where('sprint_id', $backlog->sprint->id)->first();
                if ($today === null) {
                    $history = New ItemHistory;
                    $history->story_points = "0";
                    $history->sprint_id = $backlog->sprint->id;
                    $history->save();
                }

                $today = ItemHistory::whereDate('created_at', Carbon::today())->where('sprint_id', $backlog->sprint->id)->first();
                $history = ItemHistory::find($today->id);
                $history->story_points = DB::table('backlogs')
                                            ->join('userstory_items', 'backlogs.id', '=', 'userstory_items.backlog_id')
                                            ->where('backlogs.sprint_id', $backlog->sprint_id)
                                            ->where('backlogs.is_product_backlog', False)
                                            ->where('backlogs.label', '!=', "done")
                                            ->sum('userstory_items.story_points');
                $history->save();
            }
        }
    }
}
