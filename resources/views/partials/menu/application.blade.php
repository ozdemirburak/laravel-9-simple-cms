<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- TODO: Fix Title -->
            <a href="#" class="navbar-brand">Title</a>
        </div>
        <div class="collapse navbar-collapse" id="menu-collapse">
            <ul class="nav navbar-nav">
                @foreach($menu_application->roots() as $item)
                    <li @if($item->hasChildren())class ="dropdown"@endif>
                        @if($item->link) <a @if($item->hasChildren()) class="dropdown-toggle" data-toggle="dropdown" @endif href="{{ $item->url() }}">
                            {{ $item->title }}
                            @if($item->hasChildren()) <b class="caret"></b> @endif
                        </a>
                        @else
                            {{$item->title}}
                        @endif
                        @if($item->hasChildren())
                            <ul class="dropdown-menu">
                                @foreach($item->children() as $child)
                                    <li><a href="{{ $child->url() }}">{{ $child->title }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    @if($item->divider)
                        <li{{\HTML::attributes($item->divider)}}></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>
