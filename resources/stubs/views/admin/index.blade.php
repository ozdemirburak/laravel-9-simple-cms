@extends('layouts.admin')

@section('content')
    @include('partials.admin.datatable', ['dataTable' => $dataTable, 'buttons' => true])
@endsection
