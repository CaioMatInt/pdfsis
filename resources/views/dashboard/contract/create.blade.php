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
                <li><a href="{{ route('contracts.index') }}"> Contratos cadastrados cadastrados</a></li>
                <li class="active">Criar contrato</li>
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
                        <form action="{{ route('contracts.store') }}" method="post">
                            {{ @csrf_field() }}
                            <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                                <label for="client_id">Client_ID</label>
                                <input type="number" class="form-control" name="client_id" id="client_id" value="{{ old('client_id') }}">
                                @if ($errors->has('client_id'))
                                    <span class="help-block">{{ $errors->first('client_id') }}</span>
                                @endif
                            </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                        <label for="title">Título</label>
                                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                                        @if ($errors->has('title'))
                                            <span class="help-block">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('requiriments') ? 'has-error' : '' }}">
                                        <label for="requiriments">requi</label>
                                        <input type="text" class="form-control" name="requiriments" id="requiriments" value="{{ old('requiriments') }}">
                                        @if ($errors->has('requiriments'))
                                            <span class="help-block">{{ $errors->first('requiriments') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                                        <label for="area">Area</label>
                                        <input type="text" class="form-control" name="area" id="area" value="{{ old('area') }}">
                                        @if ($errors->has('area'))
                                            <span class="help-block">{{ $errors->first('area') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('object') ? 'has-error' : '' }}">
                                <label for="object">Objeto</label>
                                <input type="text" class="form-control" name="object" id="object" value="{{ old('object') }}">
                                @if ($errors->has('object'))
                                    <span class="help-block">{{ $errors->first('object') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                        <label for="description">Descricao</label>
                                        <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}">
                                        @if ($errors->has('description'))
                                            <span class="help-block">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
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
                                    <div class="form-group {{ $errors->has('exceptions') ? 'has-error' : '' }}">
                                        <label for="exceptions">Excessões</label>
                                        <input type="text" class="form-control" name="exceptions" id="exceptions" value="{{ old('exceptions') }}">
                                        @if ($errors->has('exceptions'))
                                            <span class="help-block">{{ $errors->first('exceptions') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('additional') ? 'has-error' : '' }}">
                                        <label for="additional">Adicional</label>
                                        <input type="text" class="form-control" name="additional" id="additional" value="{{ old('additional') }}">
                                        @if ($errors->has('additional'))
                                            <span class="help-block">{{ $errors->first('additional') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('team') ? 'has-error' : '' }}">
                                        <label for="team">Time</label>
                                        <input type="text" class="form-control" name="team" id="team" value="{{ old('team') }}">
                                        @if ($errors->has('team'))
                                            <span class="help-block">{{ $errors->first('team') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('deadline') ? 'has-error' : '' }}">
                                        <label for="deadline">Prazo</label>
                                        <input type="text" class="form-control" name="deadline" id="deadline" value="{{ old('deadline') }}">
                                        @if ($errors->has('deadline'))
                                            <span class="help-block">{{ $errors->first('deadline') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('budget') ? 'has-error' : '' }}">
                                        <label for="budget">Orçamento</label>
                                        <input type="text" class="form-control" name="budget" id="budget" value="{{ old('budget') }}">
                                        @if ($errors->has('budget'))
                                            <span class="help-block">{{ $errors->first('budget') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('payment_options') ? 'has-error' : '' }}">
                                        <label for="payment_options">Opções de pagamento</label>
                                        <input type="text" class="form-control" name="payment_options" id="payment_options" value="{{ old('payment_options') }}">
                                        @if ($errors->has('payment_options'))
                                            <span class="help-block">{{ $errors->first('payment_options') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('maintenance') ? 'has-error' : '' }}">
                                        <label for="maintenance">Manutenção</label>
                                        <input type="text" class="form-control" name="maintenance" id="maintenance" value="{{ old('maintenance') }}">
                                        @if ($errors->has('maintenance'))
                                            <span class="help-block">{{ $errors->first('maintenance') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('infra') ? 'has-error' : '' }}">
                                        <label for="infra">Infraestrutura</label>
                                        <input type="text" class="form-control" name="infra" id="infra" value="{{ old('infra') }}">
                                        @if ($errors->has('infra'))
                                            <span class="help-block">{{ $errors->first('infra') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('sustentation') ? 'has-error' : '' }}">
                                        <label for="sustentation">Sustentação</label>
                                        <input type="text" class="form-control" name="sustentation" id="sustentation" value="{{ old('sustentation') }}">
                                        @if ($errors->has('sustentation'))
                                            <span class="help-block">{{ $errors->first('sustentation') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('expiration') ? 'has-error' : '' }}">
                                        <label for="expiration">Expiração</label>
                                        <input type="text" class="form-control" name="expiration" id="expiration" value="{{ old('expiration') }}">
                                        @if ($errors->has('expiration'))
                                            <span class="help-block">{{ $errors->first('expiration') }}</span>
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
                </div>

        </section>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/blog.js') }}"></script>
@endsection