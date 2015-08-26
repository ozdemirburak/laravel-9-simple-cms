@extends('layouts.admin')

@section('content')
    <div class="text-center">
        <img class="user-image img-circle" src="{{ !empty($user->picture) ? $user->picture : 'https://ssl.gstatic.com/accounts/ui/avatar_2x.png' }}" alt="{{ $user->name  }}" />
        <h1> {{ $user->name  }} </h1>
        <a href="mailto:{{ $user->email }}">
            <h2> {{ $user->email  }}</h2>
        </a>
        <h2> {{ trans('admin.fields.user.ip_address') . ': ' . $user->ip_address  }}</h2>
    </div>
@endsection
