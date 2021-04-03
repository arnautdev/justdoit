@extends('layouts.master')

@section('content')

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">
                {{ __(':categoryName expenses', ['categoryName' => strtoupper($data['category']->title)]) }}
            </h4>
        </div>
        <!-- End ./panel-heading -->

        <div class="panel-body">
            <div class="form-group">
                <a href="{{ route('monthly-reports.index') }}/?{{request()->getQueryString()}}"
                   class="btn btn-sm btn-default">
                    <i class="fa fa-arrow-left"></i>&nbsp;
                    {{ __('Back to all') }}
                </a>
            </div>
            <!-- End ./form-control -->

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Amount') }}</th>
                    <th>{{ __('Created at') }}</th>
                    <th>{{ __('To date') }}</th>
                </tr>
                </thead>

                <tbody>
                @if($data['expenses']->count() > 0)
                    @foreach($data['expenses'] as $expense)
                        <tr>
                            <td>{{ $expense->title }}</td>
                            <td>{{ $expense->description }}</td>
                            <td>{{ $page->intToFloat($expense->amount) }}</td>
                            <td>{{ $expense->created_at }}</td>
                            <td>{{ $expense->toDate }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- End ./panel-inverse -->
@endsection
