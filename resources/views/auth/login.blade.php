@extends('layouts.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <b>Every</b>ADMIN
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Faça o login para iniciar sua sessão</p>
            <form method="POST" action="{{ route('login') }}">
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
                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                @if ($errors->has('password'))
                    <p class="text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                    </p>
                @endif
                <div class="row">
                    <div class="col-xs-8">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Esqueceu sua senha?
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
