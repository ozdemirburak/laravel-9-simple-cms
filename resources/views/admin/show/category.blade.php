@extends('layouts.admin')

@section('content')
    @include('partials.admin.show.init')
    @foreach (['title', 'description'] as $a)
        @include('partials.admin.show.text', ['attribute' => $a])
    @endforeach
@endsection
