<li class="treeview {{ str_contains(url()->current(), route('admin.' . $resource . '.index')) ? 'active' : '' }}">
    <a href="{{ route('admin.' . $resource . '.index') }}"><i class="fa fa-{{ $icon }}"></i>{{ trans('admin.' . $resource . '.index') }}</a>
    <ul class="treeview-menu">
        <li class="{{ url()->current() === route('admin.' . $resource . '.create') ? 'active' : '' }}">
            <a href="{{ route('admin.' . $resource . '.create') }}"><i class="fa fa-circle-o"></i>{{ trans('admin.' . $resource . '.create') }}</a>
        </li>
        <li class="{{ url()->current() === route('admin.' . $resource . '.index') ? 'active' : '' }}">
            <a href="{{ route('admin.' . $resource . '.index') }}"><i class="fa fa-circle-o"></i>{{ trans('admin.' . $resource . '.all') }}</a>
        </li>
    </ul>
</li>
