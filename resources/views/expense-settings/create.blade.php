@extends('layouts.master')

@section('content')
    {{ $panel->start(['title' => 'Create expense']) }}

    {{ Form::open(['route' => 'expense-settings.store', 'data-parsley-validate' => 'true']) }}
    <div class="form-horizontal row">

        <div class="col-lg-6">
            {{ $form->input([
                'name' => 'title',
                'required' => true
            ]) }}

            {{ $form->select([
                'name' => 'categoryId',
                'options' => $data['categoryOptions']
            ]) }}

            {{ $form->amount([
                'name' => 'amount',
                'required' => true
            ]) }}

            {{ $form->select([
                'name' => 'isMonthly',
                'options' => ['yes' => 'Yes', 'no' => 'No']
            ]) }}


            {{ $form->submitButton() }}
        </div>
        <!-- end ./col-lg-6 -->
    </div>
    <!-- End ./form-horizontal -->
    {{ Form::close() }}

    {{ $panel->end() }}
@endsection
