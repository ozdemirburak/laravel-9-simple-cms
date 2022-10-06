@extends('layouts.admin')

@section('content')
    @include('partials.admin.show.init')
    @include('partials.admin.show.dropdown', ['attribute' => 'category_id'])
    @include('partials.admin.show.text', ['attribute' => 'published_at', 'class' => 'datepicker', 'default' => now()->format('Y-m-d')])
    @foreach (['title', 'description'] as $a)
        @include('partials.admin.show.text', ['attribute' => $a])
    @endforeach
    @include('partials.admin.show.textarea', ['attribute' => 'content'])
@endsection
