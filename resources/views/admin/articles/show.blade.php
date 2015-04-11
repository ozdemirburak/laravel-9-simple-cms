@extends('layouts.admin')

@section('content')
    <div class="col-xs-12 no-padding">
        <div class="post-title pull-left">
            <h1> {{ $article->title }} </h1>
        </div>
        <div class="pull-right category">
            <a style="background-color: {{ $article->category->color }}" href="{{  route('admin.category.show', ['id' => $article->category->id]) }}">
                {{ $article->category->title }}
            </a>
        </div>
    </div>
    <p>
        {!! $article->content !!}
    </p>
    <h2> {{ trans('admin.fields.article.description') . ': ' . $article->description  }}</h2>

@endsection