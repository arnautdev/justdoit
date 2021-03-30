@extends('layouts.master')

@section('content')

    {{ $panel->start(['title' => 'Create goal']) }}

    <div class="col-lg-6">
        {{ Form::open(['route' => 'goal.store', 'data-parsley-validate' => 'true']) }}

        {{ $form->input([
            'name' => 'title',
            'required' => 'true'
        ]) }}

        {{ $form->datepicker([
            'name' => 'startDate'
        ]) }}

        {{ $form->datepicker([
            'name' => 'endDate'
        ]) }}

        {{ $form->input([
            'type' => 'textarea',
            'name' => 'description',
            'required' => 'true',
            'attrs' => [
                'rows' => 6
            ]
        ]) }}

        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary">
                <i class="fa fa-save"></i>&nbsp;
                {{ __('Create goal') }}
            </button>
            <a href="{{ route('goal.index') }}" class="btn btn-sm btn-default">
                <i class="fa fa-arrow-left"></i>&nbsp;
                {{ __('Cancel') }}
            </a>
        </div>
        <!-- End ./form-group -->

        {{ Form::close() }}
    </div>
    <!-- End ./col-lg-6 -->

    {{ $panel->end() }}

@endsection
