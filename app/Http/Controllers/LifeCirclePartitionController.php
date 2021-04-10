<?php

namespace App\Http\Controllers;

use App\Models\LifeCirclePartition;
use Illuminate\Http\Request;

class LifeCirclePartitionController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\LifeCirclePartition $lifeCirclePartition
     * @return \Illuminate\Http\Response
     */
    public function edit(LifeCirclePartition $lifecircle_partition)
    {
        $data['partition'] = $lifecircle_partition;

        return view('lifecircle-partition.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\LifeCirclePartition $lifeCirclePartition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LifeCirclePartition $lifecircle_partition)
    {
        $update = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'progressPercent' => 'required|numeric',
        ]);

        if ($lifecircle_partition->update($update)) {
            return back()->with('success', __('success-update-message'));
        }
        return back()->with('error', __('error-update-message'));
    }
}
