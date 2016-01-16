@extends('layouts.admin')

@section('content')
    <div class="text-center">
        <img class="user-image img-circle" src="{{ !empty($object->picture) ? $object->picture : 'https://ssl.gstatic.com/accounts/ui/avatar_2x.png' }}" alt="{{ $object->name  }}" />
        <h1> {{ $object->name  }} </h1>
        <a href="mailto:{{ $object->email }}">
            <h2> {{ $object->email  }}</h2>
        </a>
        <h2> {{ trans('admin.fields.user.ip_address') . ': ' . $object->ip_address  }}</h2>
    </div>
@endsection
