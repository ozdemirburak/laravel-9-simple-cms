<div class="navbar-item {{ $class ?? '' }}">
    <form method="POST" action="{{ route('auth.logout') }}">
        <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
        <p class="field">
            <button type="submit" class="button is-dark">
                <span class="icon">{!! icon('log-out') !!}</span>
                <span>{{ __('auth.logout') }}</span>
            </button>
        </p>
    </form>
</div>
