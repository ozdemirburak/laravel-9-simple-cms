<div class="navbar-item has-dropdown is-hoverable">
    <div class="navbar-link">
        <span class="icon">{!! icon($icon) !!}</span>
        <span>{{ empty($resource) && !empty($text) ? $text : __('admin.' . $resource . '.index') }}</span>
    </div>
    <div class="navbar-dropdown">
        @if (empty($items))
            <a class="navbar-item" href="{{ route('admin.' . $resource . '.create') }}">
                <span class="icon">{!! icon('plus') !!}</span>
                <span>{{ __('admin.' . $resource . '.create') }}</span>
            </a>
            @if(!empty($extra))
                @foreach (\Illuminate\Support\Arr::wrap($extra) as $e => $i)
                    <a class="navbar-item" href="{{ route('admin.' . $resource . '.' . $e) }}">
                        <span class="icon">{!! icon($i) !!}</span>
                        <span>{{ __('admin.' . $resource . '.' . $e) }}</span>
                    </a>
                @endforeach
            @endif
            <a class="navbar-item" href="{{ route('admin.' . $resource . '.index') }}">
                <span class="icon">{!! icon('list') !!}</span>
                <span>{{ __('admin.' . $resource . '.index') }}</span>
            </a>
        @else
            @foreach ($items as $text => $values)
                <a class="navbar-item" href="{{ $values[0] }}">
                    <span class="icon">{!! icon($values[1]) !!}</span>
                    <span>{{ $text }}</span>
                </a>
            @endforeach
        @endif
    </div>
</div>
