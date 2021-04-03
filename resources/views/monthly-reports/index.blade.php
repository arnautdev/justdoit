@extends('layouts.master')

@section('content')
    {{ $panel->start(['title' => 'Filters']) }}
    {{ Form::open(['method' => 'GET']) }}
    <div class="row">
        <div class="col-3">
            {{ $form->daterangepicker(['name' => 'toDate']) }}
        </div>
    </div>

    <div class="btn-group">
        {{ $form->button('Filter') }}
        <a href="{{ route(request()->route()->getName()) }}" class="btn btn-sm btn-default">
            <i class="fa fa-window-close"></i>&nbsp;
            {{ __('Clear') }}
        </a>
    </div>

    {{ Form::close() }}
    {{ $panel->end() }}

    <div class="row">
        <div class="col-lg-6">
            {{ $panel->start(['title' => 'Group by category']) }}
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>{{ __('Category') }}</th>
                    <th>{{ __('Amount') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
                </thead>

                <tbody>
                @foreach($data['categories'] as $category)
                    <tr>
                        <td>{{ $category->title }}</td>
                        <td>{{ $page->intToFloat($category->getExpenses(request()->all())->get()->sum('amount')) }}</td>
                        <td>
                            <a href="{{ route('category-expenses.show', $category->id) }}/?{{request()->getQueryString()}}"
                               class="btn btn-xs btn-default">
                                <i class="fa fa-arrow-right"></i>&nbsp;
                                {{ __('View details') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th class="text-right">{{ __('Total amount') }}</th>
                    <th>{{ $page->intToFloat($data['expenses']->sum('amount')) }}</th>
                    <td></td>
                </tr>
                </tfoot>
            </table>
            {{ $panel->end() }}
        </div>
        <!-- End ./col-lg-6 -->

        <div class="col-lg-6">
            {{ $panel->start(['title' => 'Expenses']) }}
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Amount') }}</th>
                    <th>{{ __('Created at') }}</th>
                </tr>
                </thead>

                <tbody>
                @foreach($data['expenses'] as $expense)
                    <tr>
                        <td>{{ $expense->title }}</td>
                        <td>{{ $expense->description }}</td>
                        <td>{{ $page->intToFloat($expense->amount) }}</td>
                        <td>{{ $expense->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $panel->end() }}
        </div>
        <!-- End ./col-lg-6 -->
    </div>
    <!-- End ./row -->
@endsection
