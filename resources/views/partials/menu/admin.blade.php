<ul class="sidebar-menu">
    @foreach($items as $item)
        <li class="{{ $item->attributes() != "" ? 'active' : '' }} @if($item->hasChildren()) treeview @endif">
            <a href="{{ $item->url() }}">
                {!! $item->title !!}
                @if($item->hasChildren()) <i class="fa fa-angle-left pull-right"></i> @endif
            </a>
            @if($item->hasChildren())
                <ul class="treeview-menu">
                    @foreach($item->children() as $child)
                        <li class="{{ $child->attributes() != "" ? 'active' : '' }}"><a href="{{ $child->url() }}">{!! $child->title !!}</a></li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>