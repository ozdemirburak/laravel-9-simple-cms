@extends('layouts.admin')

@section('content')
    <div class="col-xs-12 no-padding">
        <div class="post-title">
            <h1> {{ $page->title }} </h1>
        </div>
    </div>
    <p>
        {!! $page->content !!}
    </p>
    <h2> {{ trans('admin.fields.article.description') . ': ' . $page->description  }}</h2>
@endsection