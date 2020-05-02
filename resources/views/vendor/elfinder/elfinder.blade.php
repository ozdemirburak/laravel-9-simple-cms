@php $t = __('admin.elfinder.index') @endphp

@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset($dir . '/css/elfinder.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($dir . '/css/theme.css') }}">
@endpush

@section('content')
    <section class="section">
        <div class="container is-fluid">
            <div class="columns">
                <div class="column is-12">
                    <div id="elfinder"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset($dir.'/js/elfinder.min.js') }}"></script>
    <script type="text/javascript" charset="utf-8">
      $(function() {
        $('#elfinder').elfinder({
            customData: {
              _token: '{{ csrf_token() }}'
            },
          url : '{{ route('elfinder.connector') }}',  // connector URL
          soundPath: '{{ asset($dir.'/sounds') }}'
        });
      });
    </script>
@endsection
