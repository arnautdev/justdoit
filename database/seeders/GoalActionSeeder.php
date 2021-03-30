<?php

namespace Database\Seeders;

use App\Models\GoalAction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoalActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goals = DB::table('goals')->get();
        foreach ($goals as $goal) {
            GoalAction::factory()
                ->count(1)
                ->setGoalId($goal)
                ->setUserId($goal)
                ->create();
        }
    }
}
