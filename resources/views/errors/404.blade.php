@extends('layouts.dashboard')

@section('pageTitle', 'Erro 403')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Erro 404
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Home</a></li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Página não encontrada.</h4>
                </div>
            </div>

        </section>
    </div>
@endsection

@section('scripts')

@endsection
