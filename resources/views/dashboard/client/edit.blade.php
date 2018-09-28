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
                <li><a href="{{ route('clients.index') }}"> Clientes cadastrados</a></li>
                <li class="active">Editar cliente</li>
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
                    <form action="{{ route('clients.update', $clients) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}">
                            <label for="company">Razão social</label>
                            <input type="text" class="form-control" name="company" id="company" value="{{ old('company', $clients->company) }}">
                            @if ($errors->has('company'))
                                <span class="help-block">{{ $errors->first('company') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('contact_name') ? 'has-error' : '' }}">
                                    <label for="contact_name">Nome do responsável</label>
                                    <input type="text" class="form-control" name="contact_name" id="contact_name" value="{{ old('contact_name', $clients->contact_name) }}">
                                    @if ($errors->has('contact_name'))
                                        <span class="help-block">{{ $errors->first('contact_name') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="email">E-mail</label>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $clients->email) }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('cnpj') ? 'has-error' : '' }}">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{ old('cnpj', $clients->cnpj) }}">
                            @if ($errors->has('cnpj'))
                                <span class="help-block">{{ $errors->first('cnpj') }}</span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <label for="phone">Telefone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone', $clients->phone) }}">
                                    @if ($errors->has('phone'))
                                        <span class="help-block">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <label for="address">Endereço</label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{ old('address', $clients->address) }}">
                                    @if ($errors->has('address'))
                                        <span class="help-block">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                    <label for="image">Imagem</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    @if ($errors->has('image'))
                                        <span class="help-block">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ImagemAtual">Imagem Atual</label><br>
                                    <img src="{{ Storage::url($clients->image_local)}}">
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
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/blog.js') }}"></script>
@endsection
