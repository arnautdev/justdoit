<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ExpenseSettings;
use Illuminate\Http\Request;

class ExpenseSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('expense-settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categoryOptions'] = (new Category())->selectedOptions(\request()->all());

        return view('expense-settings.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ExpenseSettings $expenseSettings
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseSettings $expenseSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ExpenseSettings $expenseSettings
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseSettings $expenseSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ExpenseSettings $expenseSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseSettings $expenseSettings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ExpenseSettings $expenseSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseSettings $expenseSettings)
    {
        if ($expenseSettings->exists && $expenseSettings->delete()) {
            return back()->with('success', __('success-delete-item'));
        }
        return back()->with('error', __('error-delete-item'));
    }


    /**
     * @param Request $request
     * @return array
     */
    private function validator(Request $request)
    {
        return $request->validate([
            'title' => 'request|minlength:3',
            'userId' => 'request',
            'amount' => 'request',
            'isMonthly' => 'request',
        ]);
    }
}
