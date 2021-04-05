@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-6">

            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ __('Create goal') }}</h4>
                    <div class="panel-heading-btn">
                        <label class="label label-success">
                            {!! __('Outstanding days: <b>:days</b>', ['days' => $data['goal']->getOutstandingDays()]) !!}
                        </label>
                    </div>
                    <!-- End ./panel-heading-btn -->
                </div>
                <!-- End ./panel-heading -->
                <div class="panel-body">
                    {{ Form::open(['route' => ['goal.update', $data['goal']->id], 'data-parsley-validate' => 'true']) }}
                    @method('PUT')
                    {{ $form->setData($data) }}

                    {{ $form->select([
                        'name' => 'isDone',
                        'required' => 'true',
                        'model' => 'goal',
                        'options' => [
                            'no' => __('No'),
                            'yes' => __('Yes'),
                        ]
                    ]) }}

                    {{ $form->input([
                        'name' => 'title',
                        'required' => 'true',
                        'model' => 'goal'
                    ]) }}

                    {{ $form->datepicker([
                        'name' => 'startDate',
                        'model' => 'goal',
                    ]) }}

                    {{ $form->datepicker([
                        'name' => 'endDate',
                        'model' => 'goal',
                    ]) }}

                    {{ $form->input([
                        'type' => 'textarea',
                        'name' => 'description',
                        'required' => 'true',
                        'model' => 'goal',
                        'attrs' => [
                            'rows' => 6
                        ]
                    ]) }}

                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-save"></i>&nbsp;
                            {{ __('Update goal') }}
                        </button>
                        <a href="{{ route('goal.index') }}" class="btn btn-sm btn-default">
                            <i class="fa fa-arrow-left"></i>&nbsp;
                            {{ __('Cancel') }}
                        </a>
                    </div>
                    <!-- End ./form-group -->

                    {{ Form::close() }}
                </div>
                <!-- End ./panel-body -->
            </div>
            <!-- End ./panel-inverse -->

        </div>
        <!-- End ./col-lg-6 -->

        <div class="col-lg-6">

            {{ $panel->start(['title' => 'Goal action']) }}

            @if($data['goalAction']->exists)
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Repeat on') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>{{ $data['goalAction']->title }}</th>
                        <td>{!! $data['goalAction']->getRepeatOnLabel() !!}</td>
                        <td>
                            {{ Form::open(['route' => 'todo-list.store']) }}
                            <a href="{{ route('goal-action.edit', $data['goalAction']->id) }}"
                               class="btn btn-xs btn-primary">
                                <i class="fa fa-pencil-alt"></i>&nbsp;
                                {{ __('Edit') }}
                            </a>

                            <input type="hidden" name="title" value="{{ $data['goal']->title }}"/>
                            <input type="hidden" name="description" value="{{ $data['goalAction']->title }}"/>
                            <input type="hidden" name="toDate" value="{{ date('Y-m-d') }}"/>
                            <input type="hidden" name="goalActionId" value="{{ $data['goalAction']->id }}"/>
                            <button type="submit" class="btn btn-xs btn-primary">
                                <i class="fa fa-save"></i>&nbsp;
                                {{ __('Create task') }}
                            </button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            @else
                {{ Form::open(['route' => 'goal-action.store', 'data-parsley-validate' => 'true']) }}
                <input type="hidden" name="goalId" value="{{ $data['goal']->id }}"/>
                {{ $form->select([
                    'name' => 'addToTodoList',
                    'options'=> [
                        'yes' => __('Yes'),
                        'no' => __('No')
                    ]
                ]) }}
                {{ $form->input(['name' => 'title', 'required' => 'true']) }}

                <div class="form-group">
                    <label>{{ __('Repeat on') }}</label><br>
                    <div class="btn-group">
                        @foreach($data['weekDays'] as $key => $val)
                            <label for="{{ $key }}" class="btn btn-sm btn-default checkbox checkbox-css cursor-pointer">
                                <input type="checkbox" id="{{ $key }}"
                                       value="{{ $key }}"
                                       name="weekDays[]"
                                       data-parsley-required="true"
                                       data-parsley-mincheck="1"
                                />
                                <label for="{{ $key }}" class="cursor-pointer">{{ __($val) }}</label>
                            </label>
                        @endforeach
                    </div>
                    <!-- End ./btn-group -->
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fa fa-save"></i>&nbsp;{{__('Save action')}}
                    </button>
                </div>
                <!-- End ./form-group -->

                {{ Form::close() }}
            @endif

            {{ $panel->end() }}

        </div>
        <!-- End ./col-lg-6 -->
    </div>
    <!-- End ./row -->
@endsection
