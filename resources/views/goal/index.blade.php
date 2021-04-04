@extends('layouts.master')

@section('content')

    {{ $panel->start(['title' => 'Filters']) }}
    {{ Form::open(['method' => 'GET']) }}

    <div class="">
        <div class="col-lg-2 no-padding">
            {{ $form->select([
                'name'=>'isDone',
                'options' => [
                    'all' => 'All',
                    'yes' => 'Yes',
                    'no' => 'No',
                ]
            ]) }}
        </div>
        <!-- End ./col-lg-2 -->
    </div>
    <!-- End ./row -->

    <div class="btn-group">
        {{ $form->button('Filter') }}
        <a href="{{ route(request()->route()->getName()) }}" class="btn btn-sm btn-default">
            <i class="fa fa-window-close"></i>&nbsp;
            {{ __('Clear') }}
        </a>
    </div>

    {{ Form::close() }}
    {{ $panel->end() }}


    {{ $panel->start(['title' => 'Available goals']) }}

    <div class="form-group">
        {{ $form->href('Create new goal', route('goal.create'), 'fa fa-plus') }}
    </div>
    <!-- End ./form-group -->

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Is done') }}</th>
            <th>{{ __('Start date') }}</th>
            <th>{{ __('Due date') }}</th>
            <th>{{ __('Outstanding days') }}</th>
            <th>{{ __('Progress bar') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @if($data['goals']->count())
            @foreach($data['goals'] as $goal)
                <tr>
                    <th class="align-middle">{{ $goal->title }}</th>
                    <td class="align-middle">{{ __(ucfirst($goal->isDone)) }}</td>
                    <td class="align-middle">{{ $goal->startDate }}</td>
                    <td class="align-middle">{{ $goal->endDate }}</td>
                    <td class="align-middle">{{ $goal->getOutstandingDays() }}</td>
                    <td class="align-middle">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated"
                                 style="width: {{ $goal->getGoalProgressPercent() }}%">
                                {{ $goal->getGoalProgressPercent() }}%
                            </div>
                        </div>
                        <!-- End ./progress -->
                        {{ $goal->getGoalProgressPercent() }}% {{ __('Complete') }}
                    </td>
                    <td class="align-middle">{{ $form->tableActions([
                        'id' => $goal->id,
                        'editRoute' => 'goal.edit',
                        'destroyRoute' => 'goal.destroy',
                    ]) }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    {{ $panel->end() }}
@endsection
