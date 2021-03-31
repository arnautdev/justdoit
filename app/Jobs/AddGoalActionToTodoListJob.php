<?php

namespace App\Jobs;

use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddGoalActionToTodoListJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $clients = Client::all();

        $clients->map(function ($client) {
            $goals = $client->goals()->where('isDone', '=', 'no')->get();
            if ($goals->count() > 0) {

                $createTodoLists = $goals->map(function ($goal) {
                    $goalAction = $goal->goalAction()->firstOrNew();
                    if ($goalAction->checkIsAddToTodoList()) {
                        return [
                            'title' => $goal->title,
                            'description' => $goalAction->title,
                            'goalActionId' => $goalAction->id,
                            'toDate' => date('Y-m-d H:i:s')
                        ];

                    }
                });

                /// create todo list
                if ($createTodoLists->count() > 0) {
                    $client->todoList()->createMany($createTodoLists);
                }
            }
        });
    }
}
