<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\ExpenseSettings;
use App\Traits\UtilsTrait;
use Illuminate\Http\Request;

class CreateStaticPriceExpenseController extends Controller
{
    use UtilsTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ExpenseSettings $expenseSettings)
    {
        $create['expenseSettingsId'] = $expenseSettings->id;
        $create['title'] = $expenseSettings->title;
        $create['categoryId'] = $expenseSettings->categoryId;
        $create['amount'] = $this->intToFloat($expenseSettings->amount);

        $expense = Expenses::create($create);
        if ($expense->exists) {
            return back()->with('success', __('success-save-message'));
        }
        return back()->with('error', __('error-save-message'));
    }
}
