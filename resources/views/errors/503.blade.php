@extends('layouts.application')

@section('title'){{ getTitle($t = __('http.503.title')) }}@endsection
@section('description'){{ getDescription($d = __('http.503.description')) }}@endsection

@section('content')
    @include('partials.application.hero', ['title' => $t, 'description' => $d])
@endsection
