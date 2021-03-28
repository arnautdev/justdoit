@extends('layouts.master')

@section('content')
    {{ $panel->start(['title' => 'Available goals']) }}

    <div class="form-group">
        {{ $form->href('Create new goal', route('goal.create'), 'fa fa-plus') }}
    </div>
    <!-- End ./form-group -->

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Start date') }}</th>
            <th>{{ __('Due date') }}</th>
            <th>{{ __('Progress bar') }}</th>
            <th>{{ __('Outstanding days') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>

    {{ $panel->end() }}
@endsection
