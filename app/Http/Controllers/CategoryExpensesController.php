<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\UtilsTrait;
use Illuminate\Http\Request;

class CategoryExpensesController extends Controller
{
    use UtilsTrait;

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category_expense)
    {
        $request = \request();
        if (!$request->get('toDate', false)) {
            $dates = $this->sqlDate()->format('Y-m-01') . ' - ' . $this->sqlDate()->format('Y-m-d H:i:s');
            $request->merge(['toDate' => $dates]);
        }

        $data['category'] = $category_expense;
        $data['expenses'] = $category_expense->getExpenses($request->all())->get();

        return view('category-expenses.show', compact('data'));
    }
}
