@extends('layouts.admin')

@section('content')
    <h1 style="color: {{ $category->color }}"> {{ $category->title  }} </h1>
    <h2> {{ trans('admin.fields.category.description') . ': ' . $category->description  }}</h2>
    <h3> {{ trans('admin.fields.category.language_id') . ': ' . $category->language->title  }}</h3>
@endsection