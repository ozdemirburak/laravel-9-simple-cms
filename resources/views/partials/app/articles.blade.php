<div class="columns is-multiline">
    @foreach ($articles as $article)
        <div class="column is-12">
            <div class="columns is-vcentered">
                <div class="column is-9">
                    <h2 class="title"><a class="has-text-grey-dark" href="{{ $article->link }}">{{ $article->title }}</a></h2>
                </div>
                <div class="column is-3 has-text-right-desktop">
                    <a href="{{ $article->category->link }}" class="button is-default">{{ $article->category->title }}</a>
                </div>
            </div>
            <div class="level"></div>
            <div class="content">
                <p>{{ getNWords($article->content, 50) }}</p>
            </div>
            <div class="columns is-vcentered">
                <div class="column is-9">
                    <a class="button is-link" href="{{ $article->link }}">{{ __('app.read_more') }}</a>
                </div>
                <div class="column is-3 has-text-right-desktop">
                    <p class="has-text-grey">{{ $article->localized_published_at }}</p>
                </div>
            </div>
        </div>
    @endforeach
    @if ($articles->total() > $articles->count())
        <div class="column is-12">
            {!! $articles->appends(request()->except('page'))->links() !!}
        </div>
    @endif
</div>
