@extends('layouts.admin')

@section('content')
    <div class="col-xs-12 no-padding">
        <div class="post-title">
            <h1> {{ $object->title }} </h1>
        </div>
    </div>
    <p>
        {!! $object->content !!}
    </p>
    <h2> {{ trans('admin.fields.article.description') . ': ' . $object->description  }}</h2>
@endsection