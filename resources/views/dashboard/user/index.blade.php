@extends('layouts.dashboard')

@section('pageTitle', $pageTitle)

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ $pageTitle }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Minha conta</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box-body">
                        @if(session('msg'))
                            @component('components.alert', ['type' => session('msg.type')])
                                {{ session('msg.text') }}
                            @endcomponent
                        @endif
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="{{ asset('assets/dashboard/img/user-icon.png') }}" alt="User profile picture">
                                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                <p class="text-muted text-center">{{ config('app.name') }}</p>
                                <hr>
                                <strong><i class="fa fa-envelope margin-r-5"></i> E-mail</strong>
                                <p class="text-muted">
                                    {{ $user->email }}
                                </p>
                                <hr>
                                <strong><i class="fa fa-calendar margin-r-5"></i> Data de cadastro</strong>
                                <p class="text-muted">{{ $user->created_at->format('d/m/Y') }}</p>
                                <hr>
                                <strong><i class="fa fa-pencil margin-r-5"></i> Última atualização</strong>
                                <p class="text-muted">{{ $user->updated_at->format('d/m/Y') }}</p>
                                <hr>
                                <strong><i class="fa fa-pencil margin-r-5"></i> Assinatura</strong>
                                <p class="text-muted">{!! $user->signature !!}</p>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{ route('user.edit', $user->user_id) }}" class="btn btn-flat btn-primary btn-block">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>  Editar informações
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="{{ route('user.edit.password') }}" class="btn btn-flat btn-primary btn-block">
                                            <i class="fa fa-lock" aria-hidden="true"></i> Atualizar senha
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
