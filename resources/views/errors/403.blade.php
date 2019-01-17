@extends('layouts.app')

@section('title'){{ getTitle($t = __('http.403.title')) }}@endsection
@section('description'){{ getDescription($d = __('http.403.description')) }}@endsection

@section('content')
    @include('partials.app.hero', ['title' => $t, 'description' => $d, 'class' => 'is-large'])
@endsection
