@extends('layouts.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <b>Every</b>ADMIN
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Informe seu e-mail de cadastro</p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                @if ($errors->has('email'))
                    <p class="text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                    </p>
                @endif
                <div class="row">
                    <div class="col-xs-4">
                        <a href="{{ route('login') }}" class="btn btn-link">Entrar</a>
                    </div>
                    <div class="col-xs-8">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Recuperar senha</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
