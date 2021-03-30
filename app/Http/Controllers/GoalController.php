<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['goals'] = Goal::filterBy(\request()->all())->get();

        return view('goal.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goal.create');
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

        $goal = Goal::create($create);
        if ($goal->exists) {
            return redirect()->route('goal.edit', $goal->id)->with('success', __('success-create-message'));
        }
        return back()->with('error', __('error-create-message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Goal $goal
     * @return \Illuminate\Http\Response
     */
    public function edit(Goal $goal)
    {
        $data['goal'] = $goal;
        $data['goalAction'] = $goal->goalAction()->firstOrNew([], []);
        $data['weekDays'] = $data['goalAction']->getWeekDays();

        return view('goal.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Goal $goal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goal $goal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Goal $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal)
    {
        //
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function validator(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|min:3|max:100',
            'description' => 'required|string|max:500',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'isDone' => 'nullable',
        ]);
    }
}
