@extends('layouts.application')

@section('title'){{ isset($page->title) ? $page->title . ' | ' .  Session::get('current_lang')->site_title : Session::get('current_lang')->site_title }}@endsection
@section('description'){{ isset($page->description) ? $page->description : Session::get('current_lang')->site_description }}@endsection

@section('content')
    @if(count($page))
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
                @if(!empty(Config::get('settings')->disqus_shortname))
                    <div id="disqus_thread" class="comments"></div>
                @endif
            </footer>
        </article>
    @endif
@endsection