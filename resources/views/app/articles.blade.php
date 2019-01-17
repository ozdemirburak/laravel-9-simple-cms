@extends('layouts.app')

@include('partials.app.sections', [
'title' => getTitle($title),
'description' => getDescription($description),
'image' => getImage()
])

@section('content')
    @include('partials.app.hero')
    <section class="section">
        <div class="container">
            @include('partials.app.articles')
        </div>
    </section>
@endsection
