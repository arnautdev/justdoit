@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-6">

            {{ $panel->start(['title' => 'My life circle']) }}
            @if(!$data['lifeCircle']->exists)
                <div class="text-center">
                    {{ Form::open(['route' => 'life-circle.store']) }}
                    <button type="submit" class="btn btn-lg btn-success">
                        <i class="fa fa-lg fa-plus-square"></i>&nbsp;&nbsp;
                        {{ __('Create my life circle') }}
                    </button>
                    {{ Form::close() }}
                </div>
                <!-- End ./text-center -->
            @else
                <div>
                    <canvas id="polar-area-chart" data-render="chart-js"
                            data-loaddata="{{ route('life-circle.getChartData') }}"></canvas>
                </div>
            @endif
            {{ $panel->end() }}

        </div>
        <!-- End ./col-lg-6 -->

        <div class="col-lg-6">
            {{ $panel->start(['title' => 'Life circle partitions']) }}

            @if($data['lifeCirclePartitions']->count() > 0)
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>{{ __('Index') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Percent') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['lifeCirclePartitions'] as $partition)
                        <tr>
                            <td class="text-center font-italic">#{{ ($loop->index + 1) }}</td>
                            <td>
                                <b>{{ $partition->title }}</b> - {{ $partition->description }}
                            </td>
                            <td>{{ $partition->progressPercent }} %</td>
                            <td>
                                <a href="{{ route('lifecircle-partition.edit', $partition->id) }}"
                                   class="btn btn-xs btn-primary">
                                    <i class="fa fa-edit"></i>&nbsp;
                                    {{ __('Edit') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

            {{ $panel->end() }}
        </div>
        <!-- End ./col-lg-6 -->
    </div>
    <!-- End ./row -->

    @push('scriptsBefore')
        <script src="{{ asset('plugins/chart.js/dist/Chart.min.js') }}"></script>
    @endpush

@endsection
