<nav class="navbar navbar-default navbar-custom">
    <div class="container">
        <div class="inside">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{  route('root') }}">{{ session('current_lang')->site_title }}</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                @if(count(session('current_lang')->pages))
                    <ul class="nav navbar-nav">
                        @foreach(session('current_lang')->pages->toHierarchy() as $node)
                            @include('partials.application.node')
                        @endforeach
                    </ul>
                @endif
                <ul class="nav navbar-nav navbar-right">
                    @if(!empty(config('settings')->facebook))
                        <li><a target="_blank" href="{{ config('settings')->facebook }}"><i class="fa fa-facebook"></i></a></li>
                    @endif
                    @if(!empty(config('settings')->twitter))
                        <li><a target="_blank" href="{{ config('settings')->twitter }}"><i class="fa fa-twitter"></i></a></li>
                    @endif
                    @if(!empty(config('settings')->email))
                        <li><a target="_blank" href="mailto:{{ config('settings')->email }}"><i class="fa fa-envelope"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
