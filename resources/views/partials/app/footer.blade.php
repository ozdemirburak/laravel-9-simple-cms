<footer class="footer">
    <div class="container">
        <div class="content">
            <div class="columns">
                <div class="column is-3">
                    <p class="title is-5">{{ __('app.footer.follow') }}</p>
                        <p>
                            <a href="https://www.facebook.com" rel="nofollow noopener" target="_blank">
                                <span class="text">Facebook</span>
                            </a>
                        </p>
                    <p>
                        <a href="https://twitter.com" rel="nofollow noopener" target="_blank">
                            <span class="text">Twitter</span>
                        </a>
                    </p>
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
