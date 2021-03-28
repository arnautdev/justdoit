<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/// all routes needed auth
Route::middleware(['auth:client', 'auth'])->group(function () {

    Route::resource('dashboard', 'DashboardController');
    Route::resource('client', 'ClientController');
    Route::resource('todo-list', 'TodoListController');
    Route::resource('goal', 'GoalController');
    Route::resource('administrator', 'AdministratorController');
    Route::resource('monthly-reports', 'MonthlyReportsController');
    Route::resource('category', 'CategoryController');
    Route::resource('group', 'GroupController');
    Route::resource('expense-settings', 'ExpenseSettingsController');

    Route::get('/expense-dynamic-price/{expenseSettings}/create', 'CreateDynamicPriceExpenseController@create')->name('dynamic-price.create');
    Route::post('/expense-dynamic-price/{expenseSettings}/store', 'CreateDynamicPriceExpenseController@store')->name('dynamic-price.store');

    Route::get('/expense-static-price/{expenseSettings}/create', 'CreateStaticPriceExpenseController@create')->name('static-price.create');
    Route::get('/expense-static-price/{expenseSettings}/store', 'CreateStaticPriceExpenseController@store')->name('static-price.store');

    Route::resource('new-expense', 'CreateNewExpenseController')->only(['create', 'store']);

    Route::resource('expenses', 'ExpensesController');
    Route::resource('category-expenses', 'CategoryExpensesController')->only('show');
});
