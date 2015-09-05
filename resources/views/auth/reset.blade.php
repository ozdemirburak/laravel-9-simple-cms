@extends('layouts.auth')

@section('title')
    {{ trans('auth.password.title') }} | {{ trans('admin.title') }}
@stop

@section('content')

    <div class="login-box" id="login-box">

        <div class="header">
            <i class="fa fa-lock"></i> {{ trans('auth.password.title') }}
        </div>

        {!! Form::open(['method' => 'POST', 'route' => 'password.reset']) !!}

        <div class="body bg-gray-50">

            @include('errors.validation')

            {!! Form::hidden('token', $token) !!}

            <div class="form-group has-feedback">
                {!! Form::label('email', trans('auth.login.email')) !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                <i class="fa fa-envelope form-control-feedback"></i>
            </div>

            <div class="form-group has-feedback">
                {!! Form::label('password', trans('auth.reset.password')) !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
                <i class="fa fa-lock form-control-feedback"></i>
            </div>

            <div class="form-group has-feedback">
                {!! Form::label('password_confirmation', trans('auth.reset.password_confirmation')) !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                <i class="fa fa-lock form-control-feedback"></i>
            </div>

        </div>

        <div class="footer">
            {!! Form::submit(trans('auth.reset.submit'), ['class' => 'btn bg-auth btn-block btn-flat']) !!}
        </div>

        {!!  Form::close() !!}

    </div>

@endsection

