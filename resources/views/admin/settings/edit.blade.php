@extends('layouts.admin')

@section('content')
    {!! form($form) !!}
    @include('partials.admin.file', ['file'=> $object->logo])
@endsection
