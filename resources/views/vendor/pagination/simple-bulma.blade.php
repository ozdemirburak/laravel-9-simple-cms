@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true"><span>{!! __('app.pagination.previous') !!}</span></li>
        @else
            <li><a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" rel="prev">{!! __('app.pagination.previous') !!}</a></li>
        @endif
        @if ($paginator->hasMorePages())
            <li><a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">{!! __('app.pagination.next') !!}</a></li>
        @else
            <li class="disabled" aria-disabled="true"><span>{!! __('app.pagination.next') !!}</span></li>
        @endif
    </ul>
@endif
