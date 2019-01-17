@if ($paginator->hasPages())
    <nav class="pagination is-centered">
        @if ($paginator->onFirstPage())
            <button class="pagination-previous" disabled>{!! __('app.pagination.previous') !!}</button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-previous">{!! __('app.pagination.previous') !!}</a>
        @endif
        @if ($paginator->hasMorePages())
            <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">{!! __('app.pagination.next') !!}</a>
        @else
            <button class="pagination-next" disabled>{!! __('app.pagination.next') !!}</button>
        @endif
        <ul class="pagination-list">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li><span class="pagination-ellipsis"><span>{{ $element }}</span></span></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page === $paginator->currentPage())
                            <li><a class="pagination-link is-current">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}" class="pagination-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
@endif
