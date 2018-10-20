<footer class="footer">
    <div class="container">
        <div class="columns">
            <div class="column is-4">
                <div class="content">
                    <p class="title is-5">{{ __('application.footer.about') }}</p>
                    <p>{{ __('application.footer.text') }}</p>
                    <a href="{{ __('application.footer.url') }}">{{ __('application.footer.url') }}</a>
                </div>
            </div>
            <div class="column is-offset-1 is-4">
                <div class="content">
                    <p class="title is-5">{{ __('application.footer.latest') }}</p>
                    @foreach (getFooterArticles(3) as $article)
                        <p><a href="{{ $article->link }}">{{ $article->title }}{{ $article->title }}</a></p>
                    @endforeach
                </div>
            </div>
            <div class="column is-offset-1 is-2">
                <div class="content">
                    <p class="title is-5">{{ __('application.footer.follow') }}</p>
                    @foreach (['facebook' => config('settings.site_facebook'), 'twitter' => config('settings.site_twitter')] as $social => $url)
                        <p>
                            <a href="{{ $url }}" rel="nofollow noopener" target="_blank">
                                {{ ucfirst($social) }}
                            </a>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</footer>
