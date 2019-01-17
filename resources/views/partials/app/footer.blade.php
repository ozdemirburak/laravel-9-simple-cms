<footer class="footer">
    <div class="container">
        <div class="content">
            <div class="columns">
                <div class="column is-3">
                    <p class="title is-5">{{ __('app.footer.share') }}</p>
                    @foreach (['facebook', 'twitter'] as $social)
                        <p>
                            <a href="@yield($social)" rel="nofollow noopener" target="_blank">
                                <span class="icon">{!! icon($social) !!}</span>
                                <span class="text">{{ ucfirst($social) }}</span>
                            </a>
                        </p>
                    @endforeach
                </div>
                <div class="column is-3">
                    <p class="title is-5">{{ __('app.footer.latest') }}</p>
                    @foreach (getFooterArticles() as $article)
                        <p><a href="{{ $article->link }}">{{ $article->title }}</a></p>
                    @endforeach
                </div>
                <div class="column is-6">
                    <p class="title is-5">{{ __('app.footer.about') }}</p>
                    <p>{{ __('app.footer.text') }}</p>
                    <a href="{{ __('app.footer.url') }}">{{ __('app.footer.url') }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>
