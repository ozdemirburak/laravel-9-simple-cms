@extends('layouts.auth')

@section('title')
    {{ trans('auth.password.title') }}
@stop

@section('content')

    <div class="login-box" id="login-box">

        <div class="header">
            {{ trans('auth.password.title') }}
        </div>

        {!! Form::open(['method' => 'POST', 'url' => '/password/email']) !!}

        <div class="body bg-gray-50">

            @include('errors.validation')
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="form-group has-feedback">
                {!! Form::label('email', trans('auth.login.email')) !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                <i class="fa fa-envelope form-control-feedback"></i>
            </div>

        </div>

        <div class="footer">
            {!! Form::submit(trans('auth.password.submit'), ['class' => 'btn bg-olive btn-block btn-flat']) !!}
        </div>

        {!!  Form::close() !!}

    </div>

@endsection