@if ($node->isLeaf())
    <li><a href="{{ $node->link }}">{{ $node->title }}</a></li>
@else
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="{{ $node->link }}" role="button" aria-expanded="false">
            {{ $node->title }} @fa('caret-down')
        </a>
        <ul class="dropdown-menu">
            @foreach($node->children as $child)
                @include('partials.application.node', ['node' => $child])
            @endforeach
        </ul>
    </li>
@endif
