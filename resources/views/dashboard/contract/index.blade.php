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
                <li class="active">Contratos cadastrados</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Contratos cadastrados</h4>
                    <div class="pull-right box-tools">
                        <a href="{{ route('contracts.create') }}">
                            <button class="btn btn-flat btn-success btn-block">
                                <i class="fa fa-plus" aria-hidden="true"></i> Criar novo contrato
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
                            <th>Cliente_ID</th>
                            <th>Título</th>
                            <th>Area</th>
                            <th>Valor</th>
                            <th>Prazo</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        @foreach($contracts as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->client_id }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->area }}</td>
                                <td>{{ $row->budget }}</td>
                                <td>{{ $row->deadline }}</td>
                                <td class="text-center" style="width: 180px;">
                                    <div class="btn-group">
                                        <a href="{{ route('contracts.edit', $row->id) }}"
                                           class="btn btn-default btn-flat" data-toggle="tooltip" title="Editar"
                                           data-placement="top">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <button type="button" class="btn btn-default btn-flat btn-delete-email"
                                                data-url="{{ route('contracts.destroy', $row->id) }}"
                                                data-toggle="tooltip" title="Excluir" data-placement="top">
                                            <i class="fa fa-trash text-danger"></i>
                                        </button>
                                        <a href="{{ route('contracts.print', $row->id) }}"
                                           class="btn btn-default btn-flat" data-toggle="tooltip" title="Gerar PDF"
                                           data-placement="top">
                                            <i class="fa fa-print"></i>
                                        </a>
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
                text: 'Esta ação irá excluir o contrato selecionado, deseja continuar?',
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
