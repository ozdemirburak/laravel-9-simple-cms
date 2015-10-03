@extends('layouts.application')

@section('title'){{ getTitle($category) }}@endsection
@section('description'){{ getDescription($category) }}@endsection

@section('content')
    @include('application.home.index')
@endsection