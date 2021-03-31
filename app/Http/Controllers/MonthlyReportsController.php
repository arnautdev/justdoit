<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expenses;
use App\Traits\UtilsTrait;
use Illuminate\Http\Request;

class MonthlyReportsController extends Controller
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
            $dates = $this->sqlDate()->format('Y-m-01') . ' - ' . $this->sqlDate()->format('Y-m-d H:i:s');
            $request->merge(['toDate' => $dates]);
        }

        $data['categories'] = Category::filterBy(\request()->all())->get();
        $data['expenses'] = Expenses::filterBy($request->all())->get();

        return view('monthly-reports.index', compact('data'));
    }
}
