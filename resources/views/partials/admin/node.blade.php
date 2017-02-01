@if ($node->isLeaf())
    <li class="dd-item" data-id="{{ $node->id }}">
        <span class="ol-buttons">
            @include('partials.admin.ops', ['resource' => $resource, 'id' => $node->id, 'class' => 'inline'])
        </span>
        <div class="dd-handle">{{ $node->title }}</div>
    </li>
@else
    <li class="dd-item" data-id="{{ $node->id }}">
        <span class="ol-buttons">
            @include('partials.admin.ops', ['resource' => $resource, 'id' => $node->id, 'class' => 'inline'])
        </span>
        <div class="dd-handle">{{ $node->title }}</div>
        <ol class="dd-list">
            @foreach($node->children as $child)
                @include('partials.admin.node', ['node' => $child, 'resource' => $resource])
            @endforeach
        </ol>
    </li>
@endif
