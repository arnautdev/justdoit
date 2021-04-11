@extends('layouts.master')

@section('content')
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>TOTAL VISITORS</h4>
                    <p>3,291,922</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-info">
                <div class="stats-icon"><i class="fa fa-link"></i></div>
                <div class="stats-info">
                    <h4>BOUNCE RATE</h4>
                    <p>20.44%</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-orange">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>UNIQUE VISITORS</h4>
                    <p>1,291,922</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-clock"></i></div>
                <div class="stats-info">
                    <h4>AVG TIME ON SITE</h4>
                    <p>00:12:23</p>
                </div>
                <div class="stats-link">
                    <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>


    <div class="row">
        @if($data['expenses']->count())
            <div class="col-lg-6">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">{{ __('Dynamic expenses') }}</h4>
                    </div>
                    <div class="panel-body no-padding">
                        <div class="col-12">
                            <div class="row">
                                @foreach($data['expenses']->chunk(4) as $expenses)
                                    @foreach($expenses as $expense)
                                        <div class="col-lg-3 col-6 no-padding border-1">
                                            @if($expense->isDynamicAmount())
                                                <a href="{{ route('dynamic-price.create', $expense->id) }}"
                                                   class="btn btn-default w-100 h-100 text-center no-radius add-expense-modal">
                                                    {{ $expense->title }}<br>
                                                    {{ $page->intToFloat($expense->amount) }}
                                                </a>
                                            @else
                                                <a href="{{ route('static-price.store', $expense->id) }}"
                                                   class="btn btn-default w-100 h-100 text-center no-radius">
                                                    {{ $expense->title }}<br>
                                                    {{ $page->intToFloat($expense->amount) }}
                                                </a>
                                            @endif
                                        </div>
                                        <!-- End ./col-lg-3 col-6 -->
                                    @endforeach
                                @endforeach

                                <div class="col-lg-3 col-6 no-padding align-middle border-1">
                                    <a href="{{ route('new-expense.create') }}"
                                       class="btn btn-default w-100 h-100 text-center align-middle no-radius add-expense-modal">
                                        <i class="fa fa-plus"></i>&nbsp;
                                        {{ __('ADD NEW') }}<br>
                                        <small class="text-secondary">{{ __('expense') }}</small>
                                    </a>
                                </div>
                            </div>
                            <!-- End ./row -->
                        </div>
                    </div>
                    <!-- End ./panel-body -->
                </div>
            </div>
            <!-- End ./col.lg-6 -->
        @endif

        <div class="col-lg-6">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ __('Goal progress') }}</h4>
                </div>
                <div class="table-responsive">
                    <div class="panel-body">
                        @if($data['activeGoals']->count() > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Progress') }}</th>
                                    <th>{{ __('Outstanding days') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['activeGoals'] as $goal)
                                    <tr>
                                        <th class="align-middle">{{ $goal->title }}</th>
                                        <td class="align-middle">
                                            <div class="progress">
                                                <div
                                                    class="progress-bar progress-bar-striped bg-success progress-bar-animated"
                                                    style="width: {{ $goal->getGoalProgressPercent() }}%">
                                                    {{ $goal->getGoalProgressPercent() }}%
                                                </div>
                                            </div>
                                            <!-- End ./progress -->
                                            {{ $goal->getGoalProgressPercent() }}% {{ __('Complete') }}
                                        </td>
                                        <td class="align-middle">{{ $goal->getOutstandingDays() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <!-- End ./panel-body -->
                </div>
                <!-- End ./table-responsive -->
            </div>
            <!-- End ./panel -->
        </div>
        <!-- End ./col.lg-6 -->

    </div>
    <!-- End ./row -->

    <div class="row">

        <div class="col-lg-6">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ __('Todo List') }}</h4>
                    <div class="panel-heading-btn">
                        <a href="{{ route('todo-list.create') }}" class="btn btn-xs btn-success add-new-task">
                            <i class="fa fa-plus"></i>&nbsp;
                            {{ __('Add new task') }}
                        </a>
                    </div>
                </div>
                <div class="panel-body p-0">
                    <ul class="todolist">
                        @if($data['todoList']->count() > 0)
                            @foreach($data['todoList'] as $todoList)
                                <li class="@if($todoList->isDone()) active @endif">
                                    <a href="{{ route('todo-list.update', $todoList->id) }}"
                                       class="todolist-container active"
                                       data-click="todolist">
                                        <div class="todolist-input"><i class="fa fa-square"></i></div>
                                        <div class="todolist-title w-100">
                                            <label class="label label-default pull-right">
                                                {{ $todoList->created_at }}
                                            </label>
                                            {{ $todoList->title }}<br>
                                            <small>{{ $todoList->description }}</small>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- End ./col-lg-6 -->

        <div class="col-lg-6">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ __('Added today') }}</h4>
                </div>
                <div class="panel-body">
                    @if($data['addedToday']->count() > 0)
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Amount') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['addedToday'] as $expense)
                                <tr>
                                    <td>{{ $expense->title }}</td>
                                    <td>{{ $expense->created_at }}</td>
                                    <td>{{ $expense->category()->first()->title }}</td>
                                    <td>{{ $page->intToFloat($expense->amount) }}</td>
                                    <td>
                                        {{ Form::open(['route' => ['expenses.destroy', $expense->id]]) }}
                                        @method('DELETE')

                                        <a href="{{ route('expenses.edit', $expense->id) }}"
                                           class="btn btn-xs btn-primary edit-expense">
                                            <i class="fa fa-edit"></i>&nbsp;
                                            {{ __('Edit') }}
                                        </a>

                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="fa fa-trash"></i>&nbsp;
                                            {{ __('Delete') }}
                                        </button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <th class="text-right">{{ __('Total for today') }}</th>
                                <th>{{ $page->intToFloat($data['addedToday']->sum('amount')) }}</th>
                                <td></td>
                            </tr>
                            </tfoot>
                        </table>
                    @endif
                </div>
                <!-- End ./panel-body -->
            </div>
        </div>
        <!-- End ./col-lg-6 -->
    </div>
    <!-- End ./row -->


    @push('scripts')
        <script type="text/javascript" async>
            $(function () {
                $(document).on('click', '.add-new-task', function (e) {
                    e.preventDefault();
                    var $href = $(this).attr('href');
                    $.get($href, null, function ($res) {
                        $('#add-new-task-modal').remove();

                        $('body').append($res);
                        $('#add-new-task-modal').modal('show');
                        $('#add-new-task-form').parsley();
                        $('.datepicker-default').datepicker({
                            todayHighlight: true,
                            autoclose: true,
                            format: 'yyyy-mm-dd'
                        });
                    });
                });

                $(document).on('click', '.add-expense-modal', function (e) {
                    e.preventDefault();
                    var $href = $(this).attr('href');
                    $.get($href, null, function ($res) {
                        $('#add-expense-modal').remove();

                        $('body').append($res);
                        $('#add-expense-modal').modal('show');
                        $('#add-expense-form').parsley();
                    });
                });

                $(document).on('click', '.edit-expense', function (e) {
                    e.preventDefault();
                    var $href = $(this).attr('href');
                    $.get($href, null, function ($res) {
                        $('#edit-expense-modal').remove();

                        $('body').append($res);
                        $('#edit-expense-modal').modal('show');
                        $('#edit-expense-form').parsley();
                    });
                });
            });

            $(document).on('focusout', 'input[name="amount"]', function () {
                var $val = $(this).val();
                if (!Number.isInteger($val)) {
                    $val = parseFloat($val);
                } else {
                    $val = parseInt($val);
                }

                if (isNaN($val)) {
                    $val = 0;
                }

                $(this).val($val.toFixed(2));
            });
        </script>
    @endpush
@endsection
