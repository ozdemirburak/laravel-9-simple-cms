@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="container is-fluid">
            <div class="card no-box-shadow-mobile">
                <header class="card-header">
                    <p class="card-header-title">
                        {{ __(Route::getCurrentRoute()->getName()) }}
                        @if (isset($link))
                            <a class="navbar-item" href="{{ $link }}">
                                <span class="icon">{!! icon('plus') !!}</span>
                            </a>
                        @endif
                    </p>
                </header>
                <div class="card-content" style="padding-bottom: 2rem;">{!! $dataTable->table() !!}</div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    {!! $dataTable->scripts() !!}
@endsection
