<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use App\Traits\UtilsTrait;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    use UtilsTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = \request();
        if (!$request->get('toDate', false)) {
            $dates = $this->sqlDate()->format('Y-m-01') . ' - ' . $this->sqlDate()->format('Y-m-d');
            $request->merge(['toDate' => $dates]);
        }

        $data['todo-list'] = TodoList::filterBy($request->all())->get();

        return view('todo-list.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo-list.create');
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
        if (!isset($create['toDate'])) {
            $create['toDate'] = date('Y-m-d');
        }
        $todoList = TodoList::create($create);

        if ($todoList->exists) {
            return back()->with('success', __('success-create-message'));
        }
        return back()->with('error', __('error-create-message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TodoList $todoList
     * @return \Illuminate\Http\Response
     */
    public function edit(TodoList $todoList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TodoList $todoList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TodoList $todo_list)
    {
        if ($todo_list->isDone()) {
            $todo_list->update(['isDone' => 'no']);
        } else {
            $todo_list->update(['isDone' => 'yes']);
        }

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TodoList $todoList
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoList $todoList)
    {
        //
    }

    /**
     * @param Request $request
     * @return array
     */
    private function validator(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'description' => 'required',
            'toDate' => 'required|date',
            'goalActionId' => 'nullable',
        ]);
    }
}
