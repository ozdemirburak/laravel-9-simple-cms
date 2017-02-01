@php $isButton = !isset($class) || $class === 'btn'; @endphp

<ul class="list-inline no-margin-bottom">
    <li>
        <a class="{{ $isButton ? 'btn btn-xs bg-navy' : 'inline-show' }}"
           href="{{ route(implode('.', ['admin', $resource, 'show']), compact('id'))  }}">
            @fa('search') {{ trans('admin.ops.show') }}
        </a>
    </li>
    <li>
        <a class="{{ $isButton ? 'btn btn-xs bg-olive' : 'inline-edit' }}"
           href="{{ route(implode('.', ['admin', $resource, 'edit']), compact('id'))  }}">
            @fa('pencil-square-o') {{ trans('admin.ops.edit') }}
        </a>
    </li>
    <li>
        {{ Form::open(['method' => 'DELETE', 'url' => route(implode('.', ['admin', $resource, 'destroy']), compact('id'))]) }}
        <button class="{{ $isButton ? 'btn btn-xs btn-danger destroy' : 'inline-delete' }}"
                onclick="return confirm('{{ trans('admin.ops.confirmation') }}')">
            @fa('trash') {{ trans('admin.ops.delete') }}
        </button>
        {{ Form::close() }}
    </li>
</ul>
