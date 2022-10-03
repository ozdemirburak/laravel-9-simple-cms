<nav class="navbar is-light">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('root') }}">
                <img src="{{ asset(config('settings.logo')) }}" alt="{{ config('settings.site_title') }}">
            </a>
            <div id="toggle-menu" class="navbar-burger burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="menu" class="navbar-menu">
            <div class="navbar-start">
                @foreach (getMenu() as $p)
                    @if ($p->children->count() > 0)
                        <div class="navbar-item has-dropdown is-hoverable">
                            <div class="navbar-link">
                                <a class="navbar-item {{ active($p) }}" href="{{ $p->link }}">
                                    {{ $p->title }}
                                </a>
                            </div>
                            <div class="navbar-dropdown">
                                @foreach ($p->children as $child)
                                    <a class="navbar-item {{ active($child) }}" href="{{ $child->link }}">
                                        {{ $child->title }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a class="navbar-item" href="{{ $p->link }}">
                            {{ $p->title }}
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</nav>
