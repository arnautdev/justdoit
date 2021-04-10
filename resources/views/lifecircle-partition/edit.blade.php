@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-6">
            {{ $panel->start(['title' => 'Edit life circle partition']) }}

            {{ Form::open(['route'=>['lifecircle-partition.update', $data['partition']->id]]) }}
            @method('PUT')
            {{ $form->setData($data) }}

            {{ $form->input([
                'name' => 'title',
                'model' => 'partition',
            ]) }}

            {{ $form->input([
                'type' => 'textarea',
                'name' => 'description',
                'model' => 'partition',
                'attrs' => [
                    'rows' => 4
                ]
            ]) }}

            {{ $form->input([
                'type' => 'number',
                'name' => 'progressPercent',
                'model' => 'partition',
                'attrs' => [
                    'max' => 100
                ]
            ]) }}

            <div class="btn-group">
                {{ $form->button('Update partition') }}
                <a href="{{ route('life-circle.index') }}" class="btn btn-sm btn-default">
                    <i class="fa fa-arrow-left"></i>&nbsp;
                    {{ __('Back') }}
                </a>
            </div>
            <!-- End ./btn-group -->

            {{ Form::close() }}

            {{ $panel->end() }}
        </div>
    </div>
    <!-- End ./row -->

@endsection
