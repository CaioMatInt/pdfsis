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
                            <th>Cliente</th>
                            <th>Título</th>
                            <th>Versão</th>
                            <th>Area</th>
                            <th>Valor</th>
                            <th>Data da criação</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        @foreach($contracts as $row)
                            @foreach($clients as $client)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $client->company }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->version }}</td>
                                <td>{{ $row->area }}</td>
                                <td>R$ {{ $row->budget }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td class="text-center" style="width: 180px;">
                                    <div class="btn-group">
                                        <a href="{{ route('contracts.edit', $row->id) }}"
                                           class="btn btn-default btn-flat" data-toggle="tooltip" title="Editar"
                                           data-placement="top">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        @can('delete', App\Models\Contract::class)
                                        <button type="button" class="btn btn-default btn-flat btn-delete-contract"
                                                data-url="{{ route('contracts.destroy', $row->id) }}"
                                                data-toggle="tooltip" title="Excluir" data-placement="top">
                                            <i class="fa fa-trash text-danger"></i>
                                        </button>
                                        @endcan
                                        <a href="{{ route('contracts.print', $row->id) }}"
                                           class="btn btn-default btn-flat" data-toggle="tooltip" title="Gerar PDF"
                                           data-placement="top" target="_blank">
                                            <i class="fa fa-print"></i>
                                        </a>
                                        <?php $clientArray = array("id" => $client->id,"company" => $client->company,
                                            "cnpj" => $client->cnpj, "phone" => $client->phone, "address" => $client->address,
                                            "contact_name" => $client->contact_name, "email" => $client->email, "image" => $client->image,
                                             "contract_id" => $row->id );
                                        ?>
                                        <a href="{{ route('contracts.create', $clientArray) }}"
                                           class="btn btn-success btn-flat" data-toggle="tooltip" title="Criar Versão"
                                           data-placement="top">
                                            <i class="fa fa-copy"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
        $('.btn-delete-contract').click(function () {

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
