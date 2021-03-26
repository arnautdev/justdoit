<div class="modal fade" id="add-expense-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    {{ __('Add new expense') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            {{ Form::open(['route' => 'new-expense.store', 'data-parsley-validate' => 'true', 'id' => 'add-expense-form']) }}
            <div class="modal-body">
                {{ $form->amount([
                    'name' => 'title',
                    'required' => true,
                ]) }}

                {{ $form->amount([
                    'name' => 'amount',
                    'required' => true,
                    'attrs' => [
                        'data-parsley-min' => 1
                    ]
                ]) }}

                {{ $form->select([
                    'name' => 'categoryId',
                    'required' => true,
                    'emptyOption' => true,
                    'options' => $data['categoryOptions'],
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
