@extends('layouts.master')

@section('content')
    {{ $panel->start(['title' => 'Update expense']) }}

    {{ Form::open(['route' => ['expense-settings.update', $data['expense_settings']->id], 'data-parsley-validate' => 'true']) }}
    @method('PUT')
    {{ $form->setViewVars($data) }}

    <input type="hidden" name="userId" value="{{ auth()->user()->id }}"/>
    <div class="form-horizontal row">
        <div class="col-lg-6">
            {{ $form->input([
                'name' => 'title',
                'model' => 'expense_settings',
                'required' => true
            ]) }}

            {{ $form->select([
                'name' => 'categoryId',
                'model' => 'expense_settings',
                'emptyOption' => true,
                'required' => true,
                'options' => $data['categoryOptions']
            ]) }}

            {{ $form->amount([
                'name' => 'amount',
                'model' => 'expense_settings',
                'required' => true
            ]) }}

            {{ $form->select([
                'name' => 'isMonthly',
                'model' => 'expense_settings',
                'emptyOption' => true,
                'required' => true,
                'options' => [
                    'yes' => 'Yes',
                    'no' => 'No'
                ]
            ]) }}


            {{ $form->submitButton() }}
        </div>
        <!-- end ./col-lg-6 -->
    </div>
    <!-- End ./form-horizontal -->
    {{ Form::close() }}

    {{ $panel->end() }}
@endsection
