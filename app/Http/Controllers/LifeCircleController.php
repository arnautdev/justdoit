<?php

namespace App\Http\Controllers;

use App\Models\LifeCircle;
use App\Models\LifeCirclePartition;
use Illuminate\Http\Request;

class LifeCircleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $data['lifeCircle'] = $user->lifeCircle()->firstOrNew([], []);
        $data['lifeCirclePartitions'] = $data['lifeCircle']->lifeCirclePartition()->get();

        return view('life-circle.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['userId'] = auth()->id();
        $lifeCircle = LifeCircle::create($data);
        if ($lifeCircle->exists) {
            $lifeCirclePartitions = $lifeCircle->lifeCirclePartition();
            $options = (new LifeCirclePartition())->getLifeCirclePartitionOptions();

            $createOptions = [];
            foreach ($options as $key => $option) {
                $option['userId'] = auth()->id();
                $option['progressPercent'] = ($key == 1) ? 100 : rand(10, 100);
                $createOptions[$key] = $option;
            }

            $lifeCirclePartitions->createMany($createOptions);

            return back()->with('success', __('success-create-message'));
        }


        return back()->with('error', __('error-create-message'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getChartData()
    {
        $data = [
            'labels' => ['Здоровье', 'Финансъ', 'Карьера', 'Личностнъй рост', 'Духовност', 'Отдъх', 'Онтношения', 'Семья'],
            'datasets' => [
                'data' => [10, 20, 30, 50, 40, 70, 60, 90],
            ],
        ];

        $user = auth()->user();
        $lifeCircle = $user->lifeCircle()->firstOrNew([], []);
        $lifeCirclePartitions = $lifeCircle->lifeCirclePartition()->get();
        if ($lifeCirclePartitions->count() > 0) {
            $data['labels'] = $lifeCirclePartitions->pluck('title')->toArray();
            $data['datasets']['data'] = $lifeCirclePartitions->pluck('progressPercent')->toArray();
        }

        return response()->json($data);
    }
}
