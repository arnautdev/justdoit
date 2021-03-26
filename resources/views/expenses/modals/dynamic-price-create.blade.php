<div class="modal fade" id="add-expense-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    {{ __('Set amount for :expenseTitle', ['expenseTitle' => $data['expenseSettings']->title]) }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            {{ Form::open(['route' => ['dynamic-price.store', $data['expenseSettings']->id], 'data-parsley-validate' => 'true', 'id' => 'add-expense-form']) }}
            <div class="modal-body">
                {{ $form->amount([
                    'name' => 'amount',
                    'required' => true,
                    'attrs' => [
                        'data-parsley-min' => 1
                    ]
                ]) }}

                {{ $form->input([
                    'type' => 'textarea',
                    'name' => 'description',
                    'attrs' => [
                        'rows' => 4
                    ]
                ]) }}
            </div>
            <!-- End ./modal-body -->

            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">{{ __('Close') }}</a>
                <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
            </div>
            <!-- End ./modal-footer -->
            {{ Form::close() }}
        </div>
    </div>
</div>
