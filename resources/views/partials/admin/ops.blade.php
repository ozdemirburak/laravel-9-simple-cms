<ul>
    <li class="is-inline">
        <a class="button is-small is-info" href="{{ route(implode('.', ['admin', $resource, 'show']), compact('id'))  }}">
            <span class="icon">{!! icon('search') !!}</span>
            <span>{{ __('admin.ops.show') }}</span>
        </a>
    </li>
    <li class="is-inline">
        <a class="button is-small is-primary" href="{{ route(implode('.', ['admin', $resource, 'edit']), compact('id')) }}">
            <span class="icon">{!! icon('create') !!}</span>
            <span>{{ __('admin.ops.edit') }}</span>
        </a>
    </li>
    <li class="is-inline">
        <form class="is-inline" method="POST" action="{{ route(implode('.', ['admin', $resource, 'destroy']), ['id' => $id]) }}">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
            <input type="hidden" name="_method" value="DELETE">
            <button class="button is-small is-danger" type="submit" onclick="return confirm('{{ __('admin.ops.confirmation') }}')">
                <span class="icon">{!! icon('trash') !!}</span>
                <span>{{ __('admin.ops.delete') }}</span>
            </button>
        </form>
    </li>
</ul>
