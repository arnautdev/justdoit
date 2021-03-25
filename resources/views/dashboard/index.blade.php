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
                                        <div class="col-lg-3 col-6 no-padding">
                                            <a href="#" class="btn btn-default w-100 h-100 text-center no-radius">
                                                {{ $expense->title }}<br>
                                                {{ $page->intToFloat($expense->amount) }}
                                            </a>
                                        </div>
                                        <!-- End ./col-lg-3 col-6 -->
                                    @endforeach
                                @endforeach

                                <div class="col-lg-3 col-6 no-padding align-middle">
                                    <a href="#" class="btn btn-default w-100 h-100 text-center align-middle no-radius">
                                        <i class="fa fa-plus"></i>&nbsp;
                                        {{ __('ADD NEW') }}<br>
                                        0.00
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
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                           data-click="panel-expand"><i
                                class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                           data-click="panel-reload"><i
                                class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                           data-click="panel-collapse"><i
                                class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                           data-click="panel-remove"><i
                                class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Todo List</h4>
                </div>
                <div class="panel-body p-0">
                    <ul class="todolist">
                        <li class="active">
                            <a href="javascript:;" class="todolist-container active" data-click="todolist">
                                <div class="todolist-input"><i class="fa fa-square"></i></div>
                                <div class="todolist-title">Donec vehicula pretium nisl, id lacinia nisl tincidunt id.
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="todolist-container" data-click="todolist">
                                <div class="todolist-input"><i class="fa fa-square"></i></div>
                                <div class="todolist-title">Duis a ullamcorper massa.</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="todolist-container" data-click="todolist">
                                <div class="todolist-input"><i class="fa fa-square"></i></div>
                                <div class="todolist-title">Phasellus bibendum, odio nec vestibulum ullamcorper.</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="todolist-container" data-click="todolist">
                                <div class="todolist-input"><i class="fa fa-square"></i></div>
                                <div class="todolist-title">Duis pharetra mi sit amet dictum congue.</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="todolist-container" data-click="todolist">
                                <div class="todolist-input"><i class="fa fa-square"></i></div>
                                <div class="todolist-title">Duis pharetra mi sit amet dictum congue.</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="todolist-container" data-click="todolist">
                                <div class="todolist-input"><i class="fa fa-square"></i></div>
                                <div class="todolist-title">Phasellus bibendum, odio nec vestibulum ullamcorper.</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="todolist-container active" data-click="todolist">
                                <div class="todolist-input"><i class="fa fa-square"></i></div>
                                <div class="todolist-title">Donec vehicula pretium nisl, id lacinia nisl tincidunt id.
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End ./col-lg-6 -->

        <div class="col-lg-6">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                           data-click="panel-expand"><i
                                class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                           data-click="panel-reload"><i
                                class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                           data-click="panel-collapse"><i
                                class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                           data-click="panel-remove"><i
                                class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Goal progress</h4>
                </div>
                <div class="panel-body">
                    /// content here
                </div>
            </div>
        </div>
        <!-- End ./col.lg-6 -->
    </div>
    <!-- End ./row -->
@endsection
