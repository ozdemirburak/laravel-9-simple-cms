@extends('layouts.application')

@section('title'){{ getTitle($t = __('http.500.title')) }}@endsection
@section('description'){{ getDescription($d = __('http.500.description')) }}@endsection

@section('content')
    @include('partials.application.hero', ['title' => $t, 'description' => $d])
@endsection
