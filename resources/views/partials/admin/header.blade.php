<section class="content-header">

    @php $route = Route::currentRouteName() @endphp

    <h1>{{ trans(Route::getCurrentRoute()->getName()) }}
        @if (strpos($route, 'index') !== false && Route::has($createNew = substr($route, 0, strrpos($route, '.') + 1) . 'create'))
            <small>
                <a href="{{ route($createNew) }}" title="{{ trans($createNew) }}">
                    @fa('plus')
                </a>
            </small>
        @endif
    </h1>

    @php $index = substr($route, 0, strrpos($route, '.') + 1) . 'index' @endphp

    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.root') }}">
                @fa('dashboard') {{ trans('admin.menu.dashboard') }}
            </a>
        </li>
        @if (strpos($route, 'root')  === false)
            @php $isIndex = strpos($route, 'index') !== false @endphp
            @php $parent_text= $isIndex ? trans($route) : trans($index) @endphp
            <li @if($isIndex){{'class="active"'}}@endif>
                @if($isIndex)
                    {{ $parent_text }}
                @else
                    <a href="{{ route($index) }}">{{ $parent_text }}</a>
                @endif
            </li>
            @if(!$isIndex)<li class="active">{{ trans($route) }}</li>@endif
        @endif
    </ol>

</section>
