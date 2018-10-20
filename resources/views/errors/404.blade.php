@extends('layouts.application')

@section('title'){{ getTitle($t = __('http.404.title')) }}@endsection
@section('description'){{ getDescription($d = __('http.404.description')) }}@endsection

@section('content')
    @include('partials.application.hero', ['title' => $t, 'description' => $d])
@endsection
