<section class="content-header">
    @php $route = Route::currentRouteName() @endphp
    @php $index = substr($route, 0, strrpos($route, '.') + 1) . 'index' @endphp
    <nav class="breadcrumb is-centered" aria-label="breadcrumbs">
        <ul>
            <li><a href="{{ route('root') }}">{{ config('settings.site_title') }}</a></li>
            <li><a href="{{ route('admin.dashboard.index') }}">{{ __('admin.dashboard.index') }}</a></li>
            @if (strpos($route, 'root') === false && Route::has($index))
                @php $isIndex = strpos($route, 'index') !== false @endphp
                @php $parent_text= __($isIndex ? $route : $index) @endphp
                <li class="{{ $isIndex ? 'is-active' : '' }}">
                    @if($isIndex)
                        <a href="#" aria-current="page">{{ empty($t) ? $parent_text : $t }}</a>
                    @else
                        <a href="{{ route($index) }}">{{ $parent_text }}</a>
                    @endif
                </li>
                @if(!$isIndex)<li class="is-active"><a href="#" aria-current="page">{{ empty($t) ? __($route) : $t }}</a></li>@endif
            @endif
        </ul>
    </nav>
</section>
