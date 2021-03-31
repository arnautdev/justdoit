<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\ExpenseSettings;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['expenses'] = ExpenseSettings::where('showOnDashboard', '=', 'yes')->get();
        $data['addedToday'] = (new Expenses())->getTodayAdded();
        $data['todoList'] = TodoList::filterBy(\request()->all())->get();

        return view('dashboard.index', compact('data'));
    }

}
