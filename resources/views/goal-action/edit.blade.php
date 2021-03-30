@extends('layouts.master')

@section('content')

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">
                {!! __('<b>:goalTitle</b> edit action <b>:actionTitle</b>',
                    ['goalTitle' => mb_strtoupper($data['goal']->title), 'actionTitle' => mb_strtoupper($data['goalAction']->title)])
                !!}
            </h4>
        </div>
        <!-- End ./panel-heading -->
        <div class="panel-body">
            <div class="col-lg-6">
                {{ Form::open(['route' => ['goal-action.update', $data['goalAction']->id], 'data-parsley-validate' => 'true']) }}
                <input type="hidden" name="goalId" value="{{ $data['goal']->id }}"/>
                @method('PUT')
                {{ $form->setData($data) }}
                {{ $form->select([
                    'name' => 'addToTodoList',
                    'model' => 'goalAction',
                    'options'=> [
                        'yes' => __('Yes'),
                        'no' => __('No')
                    ]
                ]) }}
                {{ $form->input(['name' => 'title', 'required' => 'true', 'model' => 'goalAction']) }}

                <div class="form-group">
                    <label>{{ __('Repeat on') }}</label><br>
                    <div class="btn-group">
                        @foreach($data['weekDays'] as $key => $val)
                            <label for="{{ $key }}" class="btn btn-sm btn-default checkbox checkbox-css cursor-pointer">
                                <input type="checkbox" id="{{ $key }}"
                                       value="{{ $key }}"
                                       name="weekDays[]"
                                       data-parsley-required="true"
                                       data-parsley-mincheck="1"
                                       @if(in_array($key, $data['goalAction']->getRepeatWeekDays()))
                                       checked="checked"
                                    @endif
                                />
                                <label for="{{ $key }}" class="cursor-pointer">{{ __($val) }}</label>
                            </label>
                        @endforeach
                    </div>
                    <!-- End ./btn-group -->
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fa fa-save"></i>&nbsp;{{__('Save action')}}
                    </button>
                    <a href="{{ route('goal.edit', $data['goal']->id) }}" class="btn btn-sm btn-default">
                        <i class="fa fa-arrow-left"></i>&nbsp;
                        {{ __('Back to goal') }}
                    </a>
                </div>
                <!-- End ./form-group -->
                {{ Form::close() }}
            </div>
            <!-- End ./col-lg-6 -->
        </div>
        <!-- End ./panel-body -->
    </div>
    <!-- End ./panel -->
@endsection
