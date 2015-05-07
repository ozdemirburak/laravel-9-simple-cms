@extends('layouts.application')

@section('title'){{ isset($article->title) ? $article->title . ' | ' .  Config::get('language')->site_title : Config::get('language')->site_title }}@endsection
@section('description'){{ isset($article->description) ? $article->description : Config::get('language')->site_description }}@endsection

@section('content')
    @if(count($article))
        <div class="row">
            <article class="post">
                <header class="post-header">
                    <div class="post-category">
                        <a style="background-color: {{ $article->category->color }}" href="{{ route('category', ['id' => $article->category->id])  }}">{{ $article->category->title }}</a>
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
                </footer>
            </article>
        </div>
    @endif
@endsection