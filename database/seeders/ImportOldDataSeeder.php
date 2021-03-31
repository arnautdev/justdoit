<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Client;
use App\Models\Expenses;
use App\Models\ExpenseSettings;
use App\Models\Goal;
use App\Models\GoalAction;
use App\Models\TodoList;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ImportOldDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Client::create([
            'name' => 'Dmitry Arnaut',
            'email' => 'dmitrii.arnaut@gmail.com',
            'password' => Hash::make('dmitrii.arnaut@gmail.com'),
        ]);

        /// import categories
        $oldUserId = 11;
        $categories = DB::connection('oldDatabase')
            ->table('expense_categories')
            ->where('userId', '=', $oldUserId)
            ->get();

        foreach ($categories as $category) {
            Category::create([
                'id' => $category->id,
                'title' => $category->title,
                'userId' => $user->id
            ]);
        }

        /// import expenses
        $expenses = DB::connection('oldDatabase')
            ->table('expenses')
            ->where('userId', '=', $oldUserId)
            ->get();

        foreach ($expenses as $expens) {
            ExpenseSettings::create([
                'id' => $expens->id,
                'title' => $expens->title,
                'userId' => $user->id,
                'categoryId' => $expens->categoryId,
                'amount' => ($expens->amount / 100),
                'isMonthly' => $expens->isAutoAdd,
                'showOnDashboard' => ($expens->expenseType == 'dynamic') ? 'yes' : 'no',
            ]);
        }


        /// import monthly expenses
        $monthlyExpenses = DB::connection('oldDatabase')
            ->table('monthly_expenses')
            ->where('userId', '=', $oldUserId)
            ->get();

        foreach ($monthlyExpenses as $monthlyExpens) {
            Expenses::create([
                'userId' => $user->id,
                'categoryId' => $monthlyExpens->categoryId,
                'expenseSettingsId' => $monthlyExpens->expenseId,
                'toDate' => $monthlyExpens->toDate,
                'amount' => ($monthlyExpens->amount / 100),
                'title' => ($monthlyExpens->expenseId > 0) ? ExpenseSettings::where('id', '=', $monthlyExpens->expenseId)->firstOrNew([], [])->title : $monthlyExpens->title,
                'description' => '',
            ]);
        }

        /// import todo list
        $todoLists = DB::connection('oldDatabase')
            ->table('todo_lists')
            ->where('userId', '=', $oldUserId)
            ->get();

        foreach ($todoLists as $todoList) {
            TodoList::create([
                'userId' => $user->id,
                'goalActionId' => $todoList->goalActionId,
                'title' => $todoList->description,
                'description' => $todoList->description,
                'isDone' => $todoList->isDone,
                'toDate' => $todoList->toDate,
            ]);
        }


        /// import goals
        $goals = DB::connection('oldDatabase')
            ->table('goals')
            ->where('userId', '=', $oldUserId)
            ->get();

        foreach ($goals as $goal) {
            Goal::create([
                'id' => $goal->id,
                'userId' => $user->id,
                'title' => $goal->title,
                'deleted_at' => $goal->deleted_at,
                'description' => (is_null($goal->description)) ? '.' : $goal->description,
                'isDone' => $goal->isDone,
                'startDate' => $goal->startDate,
                'endDate' => $goal->endDate,
            ]);
        }

        /// import goal actions
        foreach ($goals as $row) {
            $goalActions = DB::connection('oldDatabase')
                ->table('goal_actions')
                ->where('goalId', '=', $row->id)
                ->get();

            foreach ($goalActions as $goalAction) {
                GoalAction::create([
                    'id' => $goalAction->id,
                    'deleted_at' => $goalAction->deleted_at,
                    'userId' => $user->id,
                    'goalId' => $goalAction->goalId,
                    'title' => $goalAction->title,
                    'description' => (isset($goalAction->description)) ? $goalAction->description : '.',
                    'weekDays' => explode(',', $goalAction->weekDays),
                    'addToTodoList' => $goalAction->addToTodoList,
                ]);
            }
        }

    }
}
