@extends('layouts.application')

@section('title'){{ getTitle($article) }}@endsection
@section('description'){{ getDescription($article) }}@endsection

@section('content')
    @if(count($article))
        <article class="post">
            <header class="post-header">
                <div class="post-category">
                    <a style="background-color: {{ $article->category->color }}" href="{{ route('category', ['category_slug' => $article->category->slug])  }}">{{ $article->category->title }}</a>
                </div>
                <div class="post-title">
                    <h2>{{ $article->title }}</h2>
                </div>
            </header>
            <div class="post-excerpt">
                {!! $article->content !!}
            </div>
            <footer class="post-footer">
                <div class="post-meta-date pull-left">
                    <i class="fa fa-clock-o"></i>
                    {{ $article->published_at }}
                </div>
                @if(!empty(Config::get('settings')->disqus_shortname))
                    <div id="disqus_thread" class="comments"></div>
                @endif
            </footer>
        </article>
    @endif
@endsection
