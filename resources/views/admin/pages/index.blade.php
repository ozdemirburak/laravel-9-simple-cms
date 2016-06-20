@extends('layouts.admin')

@section('content')
    @include('partials.admin.sortable', ['resource' => 'page'])
@endsection
