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
                <li><a href="{{ route('clients.index') }}"> Contratos cadastrados</a></li>
                <li class="active">Editar contrato</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-main-custom">
                <div class="box-body">
                    @if(session('msg'))
                        @component('components.alert', ['type' => session('msg.type')])
                            {{ session('msg.text') }}
                        @endcomponent
                    @endif
                    <form action="{{ route('contracts.update', $contracts) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title">Título</label>&nbsp;&nbsp;
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $contracts->title) }}">
                            @if ($errors->has('title'))
                                <span class="help-block">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('version') ? 'has-error' : '' }}">
                                    <label for="version">Versão</label>
                                    <input type="number" step=any class="form-control" name="version" id="version" value="{{ old('version', $contracts->version) }}">
                                    @if ($errors->has('version'))
                                        <span class="help-block">{{ $errors->first('version') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                                    <label for="area">Área</label>
                                    <input type="text" class="form-control" name="area" id="area" value="{{ old('area', $contracts->area) }}">
                                    @if ($errors->has('area'))
                                        <span class="help-block">{{ $errors->first('area') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('budget') ? 'has-error' : '' }}">
                                    <label for="budget">Valor</label>
                                    <input type="text" class="form-control" name="budget" id="budget" value="{{ old('budget', $contracts->budget) }}">
                                    @if ($errors->has('value'))
                                        <span class="help-block">{{ $errors->first('budget') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('proposal') ? 'has-error' : '' }}">
                                    <label for="proposal">Proposta Comercial</label>
                                    <textarea class="form-control" name="proposal" id="proposal">{{ old('proposal', $contracts->proposal) }}</textarea>
                                    @if ($errors->has('proposal'))
                                        <span class="help-block">{{ $errors->first('proposal') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                <button type="button" class="btn btn-default btn-flat btn-tab-back btn-history-back">
                                    <i class="fa fa-arrow-left"></i> Cancelar
                                </button>
                                <button type="submit" class="btn btn-success btn-flat float-right">
                                    <i class="fa fa-save"></i> Salvar
                                </button>
                            </div>
                        </div>

                    </form>
                        <p id="demo" onclick="myFunction()">Click me to change my text color.</p>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/plugins/tinymce/tinymce.min.js') }}"></script>
    <script>

            let title = document.getElementById("title").value;
            let budget = document.getElementById("budget").value;


        tinymce.init(
            {
                selector: 'textarea',
                height: 900,
                menubar: false,
                language: 'pt_BR',
                table_grid: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor textcolor image',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code help wordcount'
                ],
                toolbar: 'insert | undo redo | formatselect | bold italic backcolor | forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | table | help',
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tinymce.com/css/codepen.min.css'],

             })


            function myFunction() {
                var ele = tinyMCE.activeEditor.dom.get("contract-title");
                var text = $(ele).text();
                alert(text);



        }



    </script>
@endsection
