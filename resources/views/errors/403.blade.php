@extends('layouts.application')

@section('title'){{ getTitle($t = __('http.403.title')) }}@endsection
@section('description'){{ getDescription($d = __('http.403.description')) }}@endsection

@section('content')
    @include('partials.application.hero', ['title' => $t, 'description' => $d])
@endsection
