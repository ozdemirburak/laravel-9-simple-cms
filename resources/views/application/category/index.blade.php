@extends('layouts.application')

@section('title'){{ isset($category->title) ? $category->title . ' | ' .  Config::get('language')->site_title : Config::get('language')->site_title }}@endsection

@section('description'){{ isset($category->description) ? $category->description : Config::get('language')->site_description }}@endsection

@section('content')
    @include('application.home.index')
@endsection