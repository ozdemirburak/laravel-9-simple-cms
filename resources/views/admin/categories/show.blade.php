@extends('layouts.admin')

@section('content')
    <h1 style="color: {{ $object->color }}"> {{ $object->title  }} </h1>
    <h2> {{ trans('admin.fields.category.description') . ': ' . $object->description  }}</h2>
    <h3> {{ trans('admin.fields.category.language_id') . ': ' . $object->language->title  }}</h3>
@endsection