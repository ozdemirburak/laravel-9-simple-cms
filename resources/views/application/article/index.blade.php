@extends('layouts.application')

@section('title'){{ getTitle($article) }}@endsection
@section('description'){{ getDescription($article) }}@endsection

@section('content')
    <article class="post">
        <header class="post-header">
            <div class="post-category">
                <a style="background-color: {{ $article->category->color }}" href="{{ $article->category->link  }}">{{ $article->category->title }}</a>
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
            @if(!empty(config('settings')->disqus_shortname))
                <div id="disqus_thread" class="comments"></div>
            @endif
        </footer>
    </article>
@endsection
