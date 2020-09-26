@extends('layouts.app')

@include('partials.app.sections', [
'title' => getTitle($title = $object->title),
'description' => getDescription($description = $object->description),
'image' => getImage()
])

@section('content')
    @include('partials.app.hero', ['class' => 'has-text-centered'])
    @include('partials.app.content', ['content' => $object->content])
@endsection
