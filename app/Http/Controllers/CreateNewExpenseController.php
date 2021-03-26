<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expenses;
use Illuminate\Http\Request;

class CreateNewExpenseController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categoryOptions'] = (new Category())->selectedOptions();

        return view('expenses.modals.create-new-expense', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = $this->validator($request);

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
