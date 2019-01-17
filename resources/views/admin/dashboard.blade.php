@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endpush

@section('content')
    <section class="section">
        <div class="container is-fluid">
            <section class="info-tiles">
                <div class="tile is-ancestor has-text-centered">
                    @include('partials.admin.dashboard.tile', ['icon' => 'user',  'value' => formatNumber($today), 'key' => 'visits_today'])
                    @include('partials.admin.dashboard.tile', ['icon' => 'users', 'value' => formatNumber($statistics['total_visits']), 'key' => 'total_visits'])
                    @include('partials.admin.dashboard.tile', ['icon' => 'corner-down-left', 'value' => $statistics['averages']['bounce'] . '%', 'key' => 'bounce_rate'])
                    @include('partials.admin.dashboard.tile', ['icon' => 'globe', 'value' => formatNumber($statistics['alexa'][1]), 'key' => 'alexa_world'])
                </div>
            </section>
            <div class="columns">
                <div class="column is-6">
                    <div class="tabs is-boxed" id="tab-header">
                        <ul>
                            @include('partials.admin.dashboard.tab_header', ['isActive' => 'is-active', 'id' => 'pages', 'icon' => 'book'])
                            @include('partials.admin.dashboard.tab_header', ['id' => 'keywords', 'icon' => 'eye'])
                            @include('partials.admin.dashboard.tab_header', ['id' => 'entrance-pages', 'icon' => 'log-in'])
                            @include('partials.admin.dashboard.tab_header', ['id' => 'exit-pages', 'icon' => 'log-out'])
                            @include('partials.admin.dashboard.tab_header', ['id' => 'time-pages', 'icon' => 'clock'])
                            @include('partials.admin.dashboard.tab_header', ['id' => 'traffic-sources', 'icon' => 'square'])
                            @include('partials.admin.dashboard.tab_header', ['id' => 'browsers', 'icon' => 'chrome'])
                            @include('partials.admin.dashboard.tab_header', ['id' => 'os', 'icon' => 'hard-drive'])
                        </ul>
                    </div>
                    <div id="tab-container">
                        @include('partials.admin.dashboard.tab_box', ['isActive' => 'is-active', 'id' => 'pages', 'data' => $statistics['pages'], 'key' => 'url', 'value' => 'pageViews'])
                        @include('partials.admin.dashboard.tab_box', ['id' => 'keywords', 'data' => $statistics['keywords'], 'key' => 'keyword', 'value' => 'sessions'])
                        @include('partials.admin.dashboard.tab_box', ['id' => 'entrance-pages', 'data' => $statistics['landings'], 'key' => 'path', 'value' => 'visits'])
                        @include('partials.admin.dashboard.tab_box', ['id' => 'exit-pages', 'data' => $statistics['exits'], 'key' => 'path', 'value' => 'visits'])
                        @include('partials.admin.dashboard.tab_box', ['id' => 'time-pages', 'data' => $statistics['times'], 'key' => 'path', 'value' => 'time', 'isDate' => true])
                        @include('partials.admin.dashboard.tab_box', ['id' => 'traffic-sources', 'data' => $statistics['sources'], 'key' => 'path', 'value' => 'visits'])
                        @include('partials.admin.dashboard.tab_box', ['id' => 'browsers', 'data' => $statistics['browsers'], 'key' => 'browser', 'value' => 'visits'])
                        @include('partials.admin.dashboard.tab_box', ['id' => 'os', 'data' => $statistics['os'], 'key' => 'os', 'value' => 'visits'])
                    </div>
                </div>
                <div class="column is-6">
                    <div class="card">
                        <header class="card-header"><p class="card-header-title">{{ __('admin.fields.dashboard.visits') }}</p></header>
                        <div class="card-content"><div class="chart right-charts" id="visitor-chart"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.0/raphael-min.js"></script>
    <script>
      $('#tab-header ul li').on('click', function() {
        $('#tab-header ul li').removeClass('is-active');
        $('#tab-container .container-item').removeClass('is-active');
        $(this).addClass('is-active');
        $($(this).data('href')).addClass('is-active');
      });
      $(function() {
        Morris.Line({
          element: 'visitor-chart',
          data: {!! $statistics['visits'] !!},
          xkey: 'date',
          ykeys: ['visits'],
          labels: ['{{ __('admin.fields.dashboard.visits') }}'],
          lineColors: ['#3B525E'],
          gridTextColor: ['#4a4a4a'],
          hideHover: 'auto',
          resize: true,
          redraw: true
        });
      });
    </script>
@endsection
