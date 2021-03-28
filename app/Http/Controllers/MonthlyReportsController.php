<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expenses;
use Illuminate\Http\Request;

class MonthlyReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::filterBy(\request()->all())->get();
        $data['expenses'] = Expenses::filterBy(\request()->all())->get();

        return view('monthly-reports.index', compact('data'));
    }
}
