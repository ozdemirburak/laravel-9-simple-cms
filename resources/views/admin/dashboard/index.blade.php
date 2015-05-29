@extends('layouts.admin', ['no_boxes' => true])

@section('content')
    <section class="content">
        <div class="row">
            {!! dashboard_box("bg-aqua", "user-plus",
                trans('admin.fields.dashboard.total_visits'), $statistics['total_visits']) !!}
            {!! dashboard_box("bg-green", "user-times",
                trans('admin.fields.dashboard.bounce_rate'), $statistics['averages']['bounce'] . "%") !!}
            {!! dashboard_box("bg-yellow", "clock-o",
                trans('admin.fields.dashboard.average_time'), formatMilliseconds($statistics['averages']['time'])) !!}
            {!! dashboard_box("bg-red", "exchange",
                trans('admin.fields.dashboard.page_visits'),  $statistics['averages']['visit']) !!}
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#pages" data-toggle="tab">
                                <i class="fa fa-file"></i> {{ trans('admin.fields.dashboard.pages') }}
                            </a>
                        </li>
                        <li>
                            <a href="#keywords" data-toggle="tab">
                                <i class="fa fa-key"></i> {{ trans('admin.fields.dashboard.keywords') }}
                            </a>
                        </li>
                        <li>
                            <a href="#entrance-pages" data-toggle="tab">
                                <i class="fa fa-building-o"></i> {{  trans('admin.fields.dashboard.entrance_pages') }}
                            </a>
                        </li>
                        <li>
                            <a href="#exit-pages" data-toggle="tab">
                                <i class="fa fa-power-off"></i> {{ trans('admin.fields.dashboard.exit_pages') }}
                            </a>
                        </li>
                        <li>
                            <a href="#time-pages" data-toggle="tab">
                                <i class="fa fa-clock-o"></i> {{ trans('admin.fields.dashboard.time_pages') }}
                            </a>
                        </li>
                        <li>
                            <a href="#traffic-sources" data-toggle="tab">
                                <i class="fa fa-lightbulb-o"></i> {{ trans('admin.fields.dashboard.traffic_sources') }}
                            </a>
                        </li>
                        <li>
                            <a href="#browsers" data-toggle="tab">
                                <i class="fa fa-android"></i> {{ trans('admin.fields.dashboard.browsers') }}
                            </a>
                        </li>
                        <li>
                            <a href="#os" data-toggle="tab">
                                <i class="fa fa-linux"></i> {{ trans('admin.fields.dashboard.os') }}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content no-padding">
                        <div class="tab-pane statistic-tabs active" id="pages">
                            <ul class="item-list">
                                @foreach($statistics['pages'] as $p)
                                <li>
                                    {{ $p['url'] }}<span class="pull-right"> {{ $p['pageViews'] }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane statistic-tabs" id="keywords">
                            <ul class="item-list">
                                @foreach($statistics['keywords'] as $p)
                                <li>
                                    {{ $p['keyword'] }}<span class="pull-right"> {{ $p['sessions'] }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane statistic-tabs" id="entrance-pages">
                            <ul class="item-list">
                                @foreach($statistics['landings'] as $p)
                                <li>
                                    {{ $p['path'] }}<span class="pull-right"> {{ $p['visits'] }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane statistic-tabs" id="exit-pages">
                            <ul class="item-list">
                                @foreach($statistics['exits'] as $p)
                                <li>
                                    {{ $p['path'] }}<span class="pull-right"> {{ $p['visits'] }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane statistic-tabs" id="time-pages">
                            <ul class="item-list">
                                @foreach($statistics['times'] as $p)
                                <li>
                                    {{ $p['path'] }}<span class="pull-right"> {{ formatMilliseconds($p['time']) }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane statistic-tabs" id="traffic-sources">
                            <ul class="item-list">
                                @foreach($statistics['sources'] as $p)
                                <li>
                                    {{ $p['path'] }}<span class="pull-right"> {{ $p['visits'] }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane statistic-tabs" id="browsers">
                            <ul class="item-list">
                                @foreach($statistics['browsers'] as $p)
                                <li>
                                    {{ $p['browser'] }}<span class="pull-right"> {{ $p['visits'] }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane statistic-tabs" id="os">
                            <ul class="item-list">
                                @foreach($statistics['ops'] as $p)
                                <li>
                                    {{ $p['os'] }}<span class="pull-right"> {{ $p['visits'] }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-solid bg-dark-blue-gradient">
                    <div class="box-header">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">{{ trans('admin.fields.dashboard.visits') }}</h3>
                    </div>
                    <div class="box-body border-radius-none">
                        <div class="chart right-charts" id="visitor-chart"></div>
                    </div>
                </div>
                <div class="box box-solid bg-blue-special">
                    <div class="box-header">
                        <i class="fa fa-location-arrow"></i>
                        <h3 class="box-title">{{ trans('admin.fields.dashboard.region_visitors') }}</h3>
                    </div>
                    <div class="box-body">
                        <div id="region-map"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box bg-gray-white">
                    <div class="box-header">
                        <i class="fa fa-globe"></i>
                        <h3 class="box-title">{{ trans('admin.fields.dashboard.world_visitors') }}</h3>
                    </div>
                    <div class="box-body">
                        <div id="world-map"></div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <script src="{{ url('js/raphael.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script>

        $(function() {
            Morris.Line({
                element: 'visitor-chart',
                data: {!! $statistics['visits'] !!},
                xkey: 'date',
                ykeys: ['visits'],
                labels: ['{{ trans('admin.fields.dashboard.visits') }}'],
                lineColors: ['#3B525E'],
                gridTextColor: ['#ebf4f9'],
                hideHover: 'auto',
                resize: true,
                redraw: true
            });
        });

        google.load("visualization", "1", {packages:["geochart"]});
        google.setOnLoadCallback(drawRegionsMap);
        google.setOnLoadCallback(drawLocalRegionsMap);

        function drawRegionsMap() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', '{{ trans('admin.fields.dashboard.chart_country') }}');
            data.addColumn('number', '{{ trans('admin.fields.dashboard.chart_visitors') }}');
            data.addRows({!! $statistics['countries'] !!});
            var options = {
                colors:['#c8e0ed','#24536e'],
                backgroundColor: '#f9f9f9',
                datalessRegionColor: '#e5e5e5',
                legend:  {textStyle: {fontName: 'Source Sans Pro'}}
            };
            var chart = new google.visualization.GeoChart(document.getElementById('world-map'));
            chart.draw(data, options);
        }

        function drawLocalRegionsMap(){
            var data = new google.visualization.DataTable();
            data.addColumn('string', '{{ trans('admin.fields.dashboard.chart_region') }}');
            data.addColumn('number', '{{ trans('admin.fields.dashboard.chart_visitors') }}');
            data.addRows({!! $statistics['regions'] !!});
            var options = {
                colorAxis: {colors: ['#92c1dc', '#2d688a']},
                backgroundColor: '#55a9bc',
                legend:  {textStyle: {color: '#000', fontName: 'Source Sans Pro'}},
                displayMode: 'markers',
                region: '{{  env('ANALYTICS_COUNTRY_CODE') }}'
            };
            var chart = new google.visualization.GeoChart(document.getElementById('region-map'));
            chart.draw(data, options);
        }

    </script>
@endsection