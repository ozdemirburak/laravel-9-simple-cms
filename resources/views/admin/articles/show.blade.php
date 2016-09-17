@extends('layouts.admin')

@section('content')
    <div class="col-xs-12 no-padding">
        <div class="post-title pull-left">
            <h1> {{ $object->title }} </h1>
        </div>
        <div class="pull-right category">
            <a style="background-color: {{ $object->category->color }}" href="{{  route('admin.category.show', ['id' => $object->category->id]) }}">
                {{ $object->category->title }}
            </a>
        </div>
    </div>
    <p>
        {!! $object->content !!}
    </p>
    <h2> {{ trans('admin.fields.article.description') . ': ' . $object->description  }}</h2>
@endsection
