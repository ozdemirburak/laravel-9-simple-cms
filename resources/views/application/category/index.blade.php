@extends('layouts.application')

@section('title'){{ isset($category->title) ? $category->title . ' | ' .  Session::get('current_lang')->site_title : Session::get('current_lang')->site_title }}@endsection

@section('description'){{ isset($category->description) ? $category->description : Session::get('current_lang')->site_description }}@endsection

@section('content')
    @include('application.home.index')
@endsection