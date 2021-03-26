<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\ExpenseSettings;
use Illuminate\Http\Request;

class CreateDynamicPriceExpenseController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ExpenseSettings $expenseSettings)
    {
        $data['expenseSettings'] = $expenseSettings;
        return view('expenses.modals.dynamic-price-create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ExpenseSettings $expenseSettings)
    {
        $create = $this->validator($request);

        $create['expenseSettingsId'] = $expenseSettings->id;
        $create['title'] = $expenseSettings->title;
        $create['categoryId'] = $expenseSettings->categoryId;

        $expense = Expenses::create($create);
        if ($expense->exists) {
            return back()->with('success', __('success-save-message'));
        }
        return back()->with('error', __('error-save-message'));
    }

    /**
     * @param Request $request
     * @return array
     */
    private function validator(Request $request)
    {
        return $request->validate([
            'amount' => 'required|numeric',
            'description' => 'nullable',
        ]);
    }

}
