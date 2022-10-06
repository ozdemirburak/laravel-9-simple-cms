@extends('layouts.admin')

@section('content')
    @include('partials.admin.show.init')
    @include('partials.admin.show.dropdown', ['attribute' => 'parent_id', 'null' => true])
    @foreach (['title', 'description'] as $a)
        @include('partials.admin.show.text', ['attribute' => $a])
    @endforeach
    @include('partials.admin.show.textarea', ['attribute' => 'content'])
@endsection
