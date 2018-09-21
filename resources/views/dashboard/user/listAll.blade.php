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
                <li class="active">Usuários cadastrados</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Usuários cadastrados</h4>
                    <div class="pull-right box-tools">
                        <a href="{{ route('user.create') }}">
                            <button class="btn btn-flat btn-success btn-block">
                                <i class="fa fa-plus" aria-hidden="true"></i> Criar novo usuário
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
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Tipo</th>
                            <th></th>
                            <th class="text-center">Ações</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->user_id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type }}</td>
                                <?php if ($user->type == 'admin') {  ?><td>	<center><i class="glyphicon glyphicon-sunglasses" ></i></center></td> <?php } ?>
                                <?php if ($user->type == 'common') {  ?><td>	<center><i class="fa fa-user" ></i></center></td> <?php } ?>
                                <td class="text-center" style="width: 180px;">
                                    <div class="btn-group">
                                        <a href="{{ route('user.edit', $user->user_id) }}"
                                           class="btn btn-default btn-flat" data-toggle="tooltip" title="Editar"
                                           data-placement="top">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <button type="button" class="btn btn-default btn-flat btn-delete-user"
                                                data-url="{{ route('user.destroy', $user->user_id) }}"
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
        $('.btn-delete-user').click(function () {

            swal({
                title: '',
                text: 'Esta ação irá excluir o usuário selecionado, deseja continuar?',
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
