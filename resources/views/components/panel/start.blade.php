<div class="panel panel-inverse">
    <div class="panel-heading">
        {{--        <div class="panel-heading-btn">--}}
        {{--            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"--}}
        {{--               data-click="panel-expand"><i--}}
        {{--                    class="fa fa-expand"></i></a>--}}
        {{--            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"--}}
        {{--               data-click="panel-reload"><i--}}
        {{--                    class="fa fa-redo"></i></a>--}}
        {{--            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"--}}
        {{--               data-click="panel-collapse"><i--}}
        {{--                    class="fa fa-minus"></i></a>--}}
        {{--            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"--}}
        {{--               data-click="panel-remove"><i--}}
        {{--                    class="fa fa-times"></i></a>--}}
        {{--        </div>--}}
        @if(isset($data['title']))
            <h4 class="panel-title">{{ __($data['title']) }}</h4>
        @endif
    </div>
    <div class="table-responsive">
        <div class="panel-body">
