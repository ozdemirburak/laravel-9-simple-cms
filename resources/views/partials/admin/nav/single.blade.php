<a class="navbar-item" href="{{ !empty($resource) && empty($link) ? route('admin.' . $resource . '.index') : $link }}">
    <span class="icon">{!! icon($icon) !!}</span>
    <span>{{ !empty($resource) && empty($text) ? __('admin.' . $resource . '.index') : $text }}</span>
</a>
