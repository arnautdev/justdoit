@extends('layouts.master')

@section('content')
    {{ $panel->start(['title' => 'Todo list']) }}

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Description') }}</th>
            <th>{{ __('To Date') }}</th>
            <th>{{ __('Is Done') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>

        <tbody>
        @if($data['todo-list']->count() > 0)
            <tbody>
            @foreach($data['todo-list'] as $todoList)
                <tr>
                    <td>{{ $todoList->title }}</td>
                    <td>{{ $todoList->description }}</td>
                    <td>{{ $todoList->toDate }}</td>
                    <td>{{ __(ucfirst($todoList->isDone)) }}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
            @endif
            </tbody>
    </table>

    {{ $panel->end() }}
@endsection
