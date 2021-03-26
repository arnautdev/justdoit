<div class="modal fade" id="edit-expense-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    {{ __('Edit expense :expenseName', ['expenseName' => $data['expense']->title]) }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            {{ Form::open(['route' => ['expenses.update', $data['expense']->id], 'data-parsley-validate' => 'true', 'id' => 'edit-expense-form']) }}
            {{ $form->setData($data) }}
            @method('PUT')

            <div class="modal-body">
                {{ $form->input([
                    'name' => 'title',
                    'required' => true,
                    'model' => 'expense',
                ]) }}

                {{ $form->amount([
                    'name' => 'amount',
                    'required' => true,
                    'model' => 'expense',
                    'attrs' => [
                        'data-parsley-min' => 1
                    ]
                ]) }}

                {{ $form->select([
                    'name' => 'categoryId',
                    'required' => true,
                    'emptyOption' => true,
                    'model' => 'expense',
                    'options' => $data['categoryOptions'],
                ]) }}

                {{ $form->input([
                    'type' => 'textarea',
                    'name' => 'description',
                    'model' => 'expense',
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
