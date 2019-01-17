@extends('layouts.app')

@section('title'){{ getTitle($t = __('http.404.title')) }}@endsection
@section('description'){{ getDescription($d = __('http.404.description')) }}@endsection

@section('content')
    @include('partials.app.hero', ['title' => $t, 'description' => $d, 'class' => 'is-large'])
@endsection
