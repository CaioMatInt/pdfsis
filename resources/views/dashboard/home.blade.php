@extends('layouts.dashboard')

@section('pageTitle', $pageTitle)

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Sistema de gerenciamento de contratos

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            </ol>
        </section>

        <section class="content">

            <div class="box">
                <div class="box-header with-border">

                    <div class="boxinitimalpage">
                        <div class="container" style="width: 85% !important;">
                            <div class="row">

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                    <div class="box-part text-center">

                                        <i class="fa fa-user fa-3x" aria-hidden="true"></i>

                                        <div class="title">
                                            <h3>Clientes</h3>
                                        </div>

                                        <div class="text">
                                            <span>Gerenciar clientes / cadastrar propostas</span>
                                        </div>
                                        <br>
                                        <a class="btn btn-success" href="{{ route('clients.index') }}">Acessar</a>

                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                    <div class="box-part text-center">

                                        <i class="fa fa-file-o fa-3x" aria-hidden="true"></i>

                                        <div class="title">
                                            <h3>Propostas Comerciais</h3>
                                        </div>

                                        <div class="text">
                                            <span>Gerenciar propostas comerciais cadastradas</span>
                                        </div>
                                        <br>
                                        <a class="btn btn-success" href="{{ route('contracts.index') }}">Acessar</a>

                                    </div>
                                </div>
                                @can('delete', App\Models\User::class)
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                    <div class="box-part text-center">

                                        <i class="fa fa fa-users fa-3x" aria-hidden="true"></i>

                                        <div class="title">
                                            <h3>Gerenciar Usuários</h3>
                                        </div>

                                        <div class="text">
                                            <span>Gerenciar usuários cadastrados no sistema</span>
                                        </div>
                                        <br>
                                        <a class="btn btn-success" href="{{ route('user.listAll') }}">Acessar</a>

                                    </div>
                                </div>
                                    @endcan
                            </div>
                        </div>
                    </div>


                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
