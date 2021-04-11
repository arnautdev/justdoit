@extends('layouts.master')

@section('content')

    {{ $panel->start(['title' => 'Filters']) }}
    {{ Form::open(['method' => 'GET']) }}
    <div class="">
        <div class="col-lg-2 no-padding-left">
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
                    <td>
                        {{ Form::open(['route' => ['todo-list.update', $todoList->id]]) }}
                        @method('PUT')
                        <button type="submit" class="btn btn-xs btn-success">
                            <i class="fa fa-check-square"></i>&nbsp;
                            {{ __('Mark as done') }}
                        </button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
            @endif
            </tbody>
    </table>

    {{ $panel->end() }}
@endsection
