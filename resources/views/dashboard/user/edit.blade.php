@extends('layouts.dashboard')

@section('title', $pageTitle)

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ $pageTitle }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="{{ route('user.index') }}">Minha conta</a></li>
                <li class="active">Atualizar informações</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box-body">
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <h3 class="box-title">Atualizar informações</h3>
                                <form action="{{ route('user.update', $user) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Nome</label>
                                                <input class="form-control" name="name" id="name" type="text" value="{{ $user->name }}">
                                                @if ($errors->has('name'))
                                                    <p class="text-danger">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">E-mail</label>
                                                <input class="form-control" name="email" id="email" type="email" value="{{ $user->email }}">
                                                @if ($errors->has('email'))
                                                    <p class="text-danger">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @can('delete', App\Models\User::class)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="type">Tipo de usuário:</label>
                                                <input class="form-control" name="type" id="type" type="text" value="{{ $user->type }}">
                                                @if ($errors->has('type'))
                                                    <p class="text-danger">
                                                        <strong>{{ $errors->first('type') }}</strong>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endcan
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="signature">Assinatura:</label>
                                                <textarea class="form-control" name="signature" id="signature">{{ $user->signature }}</textarea>
                                                @if ($errors->has('signature'))
                                                    <p class="text-danger">
                                                        <strong>{{ $errors->first('signature') }}</strong>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-bottom">
                                                <a href="{{ route('user.index') }}" class="btn btn-flat btn-default">
                                                    <i class="fa fa-chevron-left" aria-hidden="true"></i> Cancelar
                                                </a>
                                                <button type="submit" class="btn btn-flat btn-success ml-20">
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section ('scripts')
    <script src="{{ asset('assets/js/plugins/tinymce/tinymce.min.js') }}"></script>

   <script>
       tinymce.init(
           {
               selector: 'textarea',
               height: 400,
               menubar: false,
               language: 'pt_BR',
               table_grid: false,
               plugins: [
                   'advlist autolink lists link image charmap print preview anchor textcolor image',
                   'searchreplace visualblocks code fullscreen',
                   'insertdatetime media table contextmenu paste code help wordcount'
               ],
               toolbar: 'insert | undo redo | formatselect | bold italic backcolor | forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | table | help | code',
               content_css: [
                   '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                   '//www.tinymce.com/css/codepen.min.css']



           })

      </script>






@endsection
