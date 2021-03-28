<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryExpensesController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category_expense)
    {
        $data['category'] = $category_expense;
        $data['expenses'] = $category_expense->getExpenses(\request()->all())->get();


        return view('category-expenses.show', compact('data'));
    }
}
