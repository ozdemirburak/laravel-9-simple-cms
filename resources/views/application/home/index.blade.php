@extends('layouts.application')

@section('title'){{ Session::get('current_lang')->site_title }}@endsection
@section('description'){{ Session::get('current_lang')->site_description }}@endsection

@section('content')
    @if(count($articles))
        @foreach($articles as $article)
            <article class="post">
                <header class="post-header">
                    <div class="post-category">
                        <a style="background-color: {{ $article->category->color }}" href="{{ route('category', ['id' => $article->category->id])  }}">{{ $article->category->title }}</a>
                    </div>
                    <div class="post-title">
                        <h2>
                            <a href="{{ route('article', ['id' => $article->id])  }}">{{ $article->title }}</a>
                        </h2>
                    </div>
                </header>
                <div class="post-excerpt">
                    {{ limit_to_numwords($article->content, 50)  }}
                </div>
                <footer class="post-footer">
                    <div class="post-meta-date pull-left">
                        <i class="fa fa-clock-o"></i>
                        {{ $article->published_at }}
                    </div>
                    <div class="pull-right">
                        <a class="btn post-btn btn-sm" href="{{ route('article', ['id' => $article->id])  }}">{{ trans('application.read_more') }}</a>
                    </div>
                </footer>
            </article>
        @endforeach
        {!! $articles->render() !!}
    @endif
@endsection