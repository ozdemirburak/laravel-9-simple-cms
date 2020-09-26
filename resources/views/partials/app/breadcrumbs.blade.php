<nav class="breadcrumb is-small is-centered" aria-label="breadcrumbs">
    <ul>
        <li><a href="{{ route('root') }}">{{ getTitle() }}</a></li>
        @if (isset($object->parent))
            <li><a href="{{ $object->parent->link }}">{{ $object->parent->title }}</a></li>
        @elseif (isset($object->category))
            <li><a href="{{ $object->category->link }}">{{ $object->category->title }}</a></li>
        @endif
        <li class="is-active"><a href="{{ url()->current() }}}" aria-current="page">{{ $object->title }}</a></li>
    </ul>
</nav>
