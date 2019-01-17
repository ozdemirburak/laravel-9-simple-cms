<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ empty($t) ? (is_array($title = __(Route::getCurrentRoute()->getName())) ? $title['title'] : $title) : $t }} | {{ config('settings.site_title') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('dist/css/admin.css')) }}">
    <link rel="shortcut icon" href="{{ asset('i/icons/favicon.ico') }}">
    @stack('styles')
</head>
<body>
@if($currentUser = auth()->user())@include('partials.admin.nav')@endif
@if(session('message'))<div class="notification is-info">{{ session('message') }}</div>@endif
@yield('content')
@if($currentUser = auth()->user())@include('partials.admin.breadcrumbs')@endif
<script src="{{ asset(mix('dist/js/admin.js')) }}" type="text/javascript"></script>
@hasSection('scripts')@yield('scripts')@endif
</body>
</html>
