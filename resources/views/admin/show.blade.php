@extends('layouts.admin')

@section('content')
    <section class="hero is-light is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                {!! $object !!}
            </div>
        </div>
    </section>
@endsection
