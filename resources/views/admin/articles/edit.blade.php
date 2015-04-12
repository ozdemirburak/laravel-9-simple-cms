@extends('layouts.admin')

@section('content')
    {!! form($form) !!}
    @include('partials.admin.tinymce')
@endsection