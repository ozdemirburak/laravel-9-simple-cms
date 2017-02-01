@if(count($articles))
    @foreach($articles as $article)
        <article class="post">
            <header class="post-header">
                <div class="post-category">
                    <a style="background-color: {{ $article->category->color }}" href="{{ $article->category->link }}">{{ $article->category->title }}</a>
                </div>
                <div class="post-title">
                    <h2>
                        <a href="{{ $article->link }}">{{ $article->title }}</a>
                    </h2>
                </div>
            </header>
            <div class="post-excerpt">
                {{ getNWords(escapeAndTrim($article->content), 50)  }}
            </div>
            <footer class="post-footer">
                <div class="post-meta-date pull-left">
                    <i class="fa fa-clock-o"></i>
                    {{ $article->published_at }}
                </div>
                <div class="pull-right">
                    <a class="btn post-btn btn-sm" href="{{ $article->link }}">{{ trans('application.read_more') }}</a>
                </div>
            </footer>
        </article>
    @endforeach
    {!! $articles->render() !!}
@endif
