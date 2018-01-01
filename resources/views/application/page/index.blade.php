@extends('layouts.application')

@section('title'){{ getTitle($page) }}@endsection
@section('description'){{ getDescription($page) }}@endsection

@section('content')
    <article class="post">
        <header class="post-header">
            <div class="post-title">
                <h2>{{ $page->title }}</h2>
            </div>
        </header>
        <div class="post-excerpt">
            {!! $page->content !!}
        </div>
        <footer class="post-footer">
            @if(!empty(config('settings')->disqus_shortname))
                <div id="disqus_thread" class="comments"></div>
            @endif
        </footer>
    </article>
@endsection
