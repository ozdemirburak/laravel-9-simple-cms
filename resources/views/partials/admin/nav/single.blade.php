<li class="{{ str_contains(url()->current(), $href = (!empty($resource) ? route('admin.' . $resource . '.index') : $link)) ? 'active' : '' }}">
    <a href="{{ $href}}">
        <i class="fa fa-{{ $icon }}"></i>{{ !empty($resource) ? trans('admin.' . $resource . '.index') : $text }}
    </a>
</li>
