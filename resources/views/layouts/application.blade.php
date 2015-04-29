<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}" />
    <meta name="description" content="{{ isset($description) ? $description : Config::get('language')->site_description }}">
    <title> {{  trans(Route::getCurrentRoute()->getName()) . ' | ' .  Config::get('language')->site_title  }} </title>
    <link rel="stylesheet" type="text/css" href="{{ url( elixir('css/application.css') ) }}">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ url( elixir('js/application.js') ) }}" type="text/javascript"></script>
    <script src="{{ url( 'js/application-custom.js' ) }}" type="text/javascript"></script>
</head>
<body>
@include('partials.application.top')
<div class="container">
    <main class="content">
        @yield('content')
    </main>
</div>
</body>
</html>