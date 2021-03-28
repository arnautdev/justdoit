@extends('layouts.master')

@section('content')
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
                            <a href="{{ route('category-expenses.show', $category->id) }}"
                               class="btn btn-xs btn-default">
                                <i class="fa fa-arrow-right"></i>&nbsp;
                                {{ __('View details') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
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
