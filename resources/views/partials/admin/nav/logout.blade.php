<div class="navbar-item {{ $class ?? '' }}">
    <form method="POST" action="{{ route('auth.logout') }}">
        @csrf
        <p class="field">
            <button type="submit" class="button is-dark">
                <span class="icon">{!! icon('log-out') !!}</span>
                <span>{{ __('auth.logout') }}</span>
            </button>
        </p>
    </form>
</div>
