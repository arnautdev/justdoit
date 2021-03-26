<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expenses;
use App\Models\ExpenseSettings;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Expenses $expenses
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenses $expense)
    {
        $data['expense'] = $expense;
        $data['categoryOptions'] = (new Category())->selectedOptions();

        return view('expenses.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expenses $expense)
    {
        $update = $this->validator($request);
        if ($expense->update($update)) {
            return back()->with('success', __('success-update-message'));
        }
        return back()->with('error', __('error-update-message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expenses $expense)
    {
        if ($expense->exists && $expense->delete()) {
            return back()->with('success', __('success-delete-message'));
        }
        return back()->with('error', __('error-delete-message'));
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function validator(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'categoryId' => 'required',
            'description' => 'nullable',
        ]);
    }
}

