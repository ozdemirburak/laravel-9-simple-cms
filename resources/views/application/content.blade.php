@extends('layouts.application')

@include('partials.application.sections', [
'title' => getTitle($title = $object->title),
'description' => getDescription($description = $object->description),
'image' => getImage()
])

@section('content')
    @include('partials.application.hero')
    @include('partials.application.content', ['content' => $object->content])
@endsection
