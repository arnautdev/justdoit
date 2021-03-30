<?php

namespace App\Http\Controllers;

use App\Models\GoalAction;
use Illuminate\Http\Request;

class GoalActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
    public function store(Request $request)
    {
        $create = $this->validator($request);

        $goalAction = GoalAction::create($create);
        if ($goalAction->exists) {
            return back()->with('success', __('success-create-message'));
        }
        return back()->with('error', __('error-create-message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\GoalAction $goal_action
     * @return \Illuminate\Http\Response
     */
    public function edit(GoalAction $goal_action)
    {
        $data['goal'] = $goal_action->goal()->firstOrNew([], []);
        $data['goalAction'] = $goal_action;
        $data['weekDays'] = $goal_action->getWeekDays();

        return view('goal-action.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GoalAction $goal_action
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GoalAction $goal_action)
    {
        $update = $this->validator($request);
        if ($goal_action->update($update)) {
            return back()->with('success', __('success-update-message'));
        }
        return back()->with('error', __('error-update-message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\GoalAction $goal_action
     * @return \Illuminate\Http\Response
     */
    public function destroy(GoalAction $goal_action)
    {
        if ($goal_action->exists && $goal_action->delete()) {
            return back()->with('success', 'success-delete-message');
        }
        return back()->with('error', 'error-delete-message');
    }


    /**
     * @param Request $request
     * @return array
     */
    private function validator(Request $request)
    {
        return $request->validate([
            'goalId' => 'required|numeric',
            'addToTodoList' => 'required',
            'title' => 'required|string|min:3',
            'weekDays' => 'required',
        ]);
    }
}
