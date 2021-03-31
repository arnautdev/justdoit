<?php

namespace App\Jobs;

use App\Models\Client;
use App\Notifications\ExpensesIsAddedNotification;
use App\Traits\UtilsTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddStaticMonthlyExpensesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, UtilsTrait;

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
            $expenseSettings = $client->expensesSettings()->where('isMonthly', '=', 'yes')->get();
            if ($expenseSettings->count() > 0) {
                $create = $expenseSettings->map(function ($row) {
                    return [
                        'categoryId' => $row->categoryId,
                        'expenseSettingsId' => $row->id,
                        'toDate' => date('Y-m-d H:i:s'),
                        'amount' => $this->intToFloat($row->amount),
                        'title' => $row->title
                    ];
                });

                /// create many
                $createdExpenses = $client->expenses()->createMany($create);

                /// notify client
                $client->notify(new ExpensesIsAddedNotification($createdExpenses));
            }
        });
    }
}
