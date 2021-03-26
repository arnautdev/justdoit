<div class="modal fade" id="add-new-task-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    {{ __('Create new task') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            {{ Form::open(['route' => 'todo-list.store', 'data-parsley-validate' => 'true', 'id' => 'add-new-task-form']) }}
            <div class="modal-body">
                {{ $form->input([
                    'name' => 'title',
                    'required' => true
                ]) }}

                {{ $form->datepicker([
                    'name' => 'toDate',
                    'required' => true
                ]) }}

                {{ $form->input([
                    'type' => 'textarea',
                    'name' => 'description',
                    'required' => true,
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
