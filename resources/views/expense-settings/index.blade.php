@extends('layouts.master')

@section('content')
    {{ $panel->start(['title' => 'Expenses settings']) }}

    <div class="form-group">
        <a href="{{ route('expense-settings.create') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-plus"></i>&nbsp;
            {{ __('Create expenses') }}
        </a>
    </div>
    <!-- End ./form-group -->

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>{{ __('# Id') }}</th>
            <th>{{ __('Created at') }}</th>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Is monthly') }}</th>
            <th>{{ __('Amount') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data['expenses'] as $expense)
            <tr>
                <td>{{ $expense->id }}</td>
                <td>{{ $expense->created_at }}</td>
                <td>{{ $expense->title }}</td>
                <td>{{ __(ucfirst($expense->isMonthly)) }}</td>
                <td>{{ $expense->amount }}</td>
                <td>
                    {{ $form->tableActions([
                        'id' => $expense->id,
                        'editRoute' => 'expense-settings.edit',
                        'destroyRoute' => 'expense-settings.destroy',
                    ]) }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $panel->end() }}
@endsection
