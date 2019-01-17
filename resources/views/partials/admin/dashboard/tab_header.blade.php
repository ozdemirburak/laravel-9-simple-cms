<li class="{{ $isActive ?? '' }}" data-href="#{{ $id }}">
    <a>
        <span class="icon">{!! icon($icon) !!}</span>
        <span>{{ __('admin.fields.dashboard.' . str_replace('-', '_', $id)) }}</span>
    </a>
</li>
