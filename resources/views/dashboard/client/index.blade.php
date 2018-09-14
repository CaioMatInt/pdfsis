@extends('layouts.dashboard')

@section('pageTitle', $pageTitle)

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{ $pageTitle }}
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Clientes cadastrados</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Clientes cadastrados</h4>
                <div class="pull-right box-tools">
                    <a href="{{ route('clients.create') }}">
                        <button class="btn btn-flat btn-success btn-block">
                            <i class="fa fa-plus" aria-hidden="true"></i> Criar novo cliente
                        </button>
                    </a>
                </div>
            </div>
            <div class="box-body">
                @if(session('msg'))
                @component('components.alert', ['type' => session('msg.type')])
                {{ session('msg.text') }}
                @endcomponent
                @endif
                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nome da empresa</th>
                            <th>CNPJ</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                            <th>Nome do responsável</th>
                            <th>E-mail</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        @foreach($clients as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->company }}</td>
                                <td>{{ $row->cnpj }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>{{ $row->address }}</td>
                                <td>{{ $row->contact_name }}</td>
                                <td>{{ $row->email }}</td>
                                <td class="text-center" style="width: 180px;">
                                    <div class="btn-group">
                                        <a href="{{ route('clients.edit', $row->id) }}"
                                           class="btn btn-default btn-flat" data-toggle="tooltip" title="Editar"
                                           data-placement="top">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <button type="button" class="btn btn-default btn-flat btn-delete-email"
                                                data-url="{{ route('clients.destroy', $row->id) }}"
                                                data-toggle="tooltip" title="Excluir" data-placement="top">
                                            <i class="fa fa-trash text-danger"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>

    </section>
</div>
@endsection

@section('scripts')
<script>
    $('.btn-delete-email').click(function () {

        swal({
            title: '',
            text: 'Esta ação irá excluir o cliente selecionado, deseja continuar?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            buttons: ['Cancelar', 'Excluir'],
        })
            .then((willDelete) => {
                if (willDelete) {
                    createDynamicForm($(this).data('url'), 'DELETE', true);
                }
                swal.close();
            });
    });
</script>

@endsection
