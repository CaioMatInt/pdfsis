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
                                <input type="number" class="form-control" name="client_id" id="client_id" value="{{$client->id}}">
                                @if ($errors->has('client_id'))
                                    <span class="help-block">{{ $errors->first('client_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title">Título</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('client_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                                <label for="title">Área</label>
                                <select id="area" class="form-control" name="area"><option selected>Desenvolvimento</option>
                                    <option>Infraestrutura</option>

                                </select>
                                @if ($errors->has('area'))
                                    <span class="help-block">{{ $errors->first('area') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('budget') ? 'has-error' : '' }}">
                                <label for="budget">Valor</label>
                                <input type="number" class="form-control" name="budget" id="budget" value="{{ old('budget') }}">
                                @if ($errors->has('budget'))
                                    <span class="help-block">{{ $errors->first('budget') }}</span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('proposal') ? 'has-error' : '' }}">
                                        <label for="proposal">Proposta Comercial</label>
                                        <textarea class="form-control" name="proposal" id="proposal" value="{{ old('proposal') }}"></textarea>
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
                                    <button type="button" class="btn btn-success" onclick="initContract()"><i class="glyphicon glyphicon-file"></i>Gerar Layout de Proposta Comercial </button>
                                    <button type="submit" class="btn btn-success btn-flat float-right">
                                        <i class="fa fa-save"></i> Salvar
                                    </button>
                                </div>
                            </div>
                </form>
                         </div>

            </div></section>
        </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/plugins/tinymce/tinymce.min.js') }}"></script>
    <script>

        function initContract(){
            let title = document.getElementById("title").value;
            let budget = document.getElementById("budget").value;
        let layout = '<br><br><div style="margin-left: 1.25cm;\n' +
            'margin-right: 1.25cm;\n' +
            'size: A4;\n' +
            'width: 21cm;\n' +
            'height: 29.7cm;"><br><div style="text-align:center;\n' +
            'font-family:Lucida Sans Unicode;\n' +
            'font-size:20pt;\n' +
            'font-weight:bold;">PROPOSTA COMERCIAL</div>'+
            '<div style="    width: 374px;\n' +
            'height: 120px;\n' +
            'background-color: blue;">Insira o logo da empresa aqui</div>'+
            '<p style="text-align:center;\n' +
            'font-family:Lucida Sans Unicode;\n' +
            'font-size:16pt;\n' +
            'font-weight:bold;">' + title + '</p>'+
            '<div style="height: 175px;"></div>'+
            '<br>'+
            'A/C'+
            '<div style="line-height: 0.5;"><p><strong>Razão social:</strong> <?php echo "$client->company"; ?></p>'+
            '<p><strong>CNPJ:</strong> <?php echo "$client->cnpj"; ?></p>'+
            '<p><strong>Telefone:</strong> <?php echo "$client->phone"; ?></p>'+
            '<p><strong>Endereço:</strong> <?php echo "$client->address"; ?></p>'+
            '<p><strong>Nome do contato:</strong> <?php echo "$client->contact_name"; ?></p>'+
            '<p><strong>E-mail:</strong> <?php echo "$client->email"; ?></p>'+
            '</div>'+
            '</div> '+
            '<div style=" margin-left: 1.25cm;'+
            'margin-right: 1.25cm;'+
            'background-color: #00b050;'+
            'color: #ffffff;'+
            'border-style: solid;'+
            'border-width: 1px;'+
            'font-size: 16px;'+
            'height: 30px;'+
            'font-family:Lucida Sans Unicode;'+
            'font-weight:bold;'+
            'line-height:30px;"> &nbsp; 1.	Objeto – Serviço Solicitado</div>'+
            '<br><div style="margin-left: 1.65cm;'+
            'margin-right: 1.65cm;'+
            'font-family:Lucida Sans Unicode;'+
            'font-size: 13.5px;">'+
            'Insira o Objeto aqui'+
            '</div><br>' +
            '<div style=" margin-left: 1.25cm;'+
            'margin-right: 1.25cm;'+
            'background-color: #00b050;'+
            'color: #ffffff;'+
            'border-style: solid;'+
            'border-width: 1px;'+
            'font-size: 16px;'+
            'height: 30px;'+
            'font-family:Lucida Sans Unicode;'+
            'font-weight:bold;'+
            'line-height:30px;"> ' +
            '&nbsp; 2. Descrição do Serviço</div>'+
            '<br><div style="margin-left: 1.65cm;'+
            'margin-right: 1.65cm;'+
            'font-family:Lucida Sans Unicode;'+
            'font-size: 13.5px;">'+
            'Insira a Descrição aqui'+
            '</div><br>' +

            '<div><table style="width: 100%;font-size: 14px; margin: 0px auto; background-color: #e2efda;">' +
            '<table border="0" cellspacing="0" cellpadding="0" width="623"">' +
            '<thead><tr>\n' +
            '<td style="background-color: #548235;"><span style="color: #ffffff;"><strong>#</strong></span></td>\n' +
            '<td style="background-color: #548235;"><span style="color: #ffffff;"><strong>Categoria</strong></span></td>\n' +
            '<td style="background-color: #548235;"><span style="color: #ffffff;"><strong>Descrição</strong></span></td>\n' +
            '</thead></tr>\n' +
            '<tbody><tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr></tbody>\n' +
            '</table></div>'+
            '<br>' +
            '<pagebreak />'+

            '<div style=" margin-left: 1.25cm;'+
            'margin-right: 1.25cm;'+
            'background-color: #00b050;'+
            'color: #ffffff;'+
            'border-style: solid;'+
            'border-width: 1px;'+
            'font-size: 16px;'+
            'height: 30px;'+
            'font-family:Lucida Sans Unicode;'+
            'font-weight:bold;'+
            'line-height:30px;"> &nbsp; 3.\tPré requisitos  </div>'+
            '<br><div style="margin-left: 1.65cm;'+
            'margin-right: 1.65cm;'+
            'font-family:Lucida Sans Unicode;'+
            'font-size: 13.5px;">'+
            'Insira os pré-requisitos aqui'+
            '</div><br>' +

            '<div style=" margin-left: 1.25cm;'+
            'margin-right: 1.25cm;'+
            'background-color: #00b050;'+
            'color: #ffffff;'+
            'border-style: solid;'+
            'border-width: 1px;'+
            'font-size: 16px;'+
            'height: 30px;'+
            'font-family:Lucida Sans Unicode;'+
            'font-weight:bold;'+
            'line-height:30px;"> &nbsp; 4.\tExceções </div>'+
            '<br><div style="margin-left: 1.65cm;'+
            'margin-right: 1.65cm;'+
            'font-family:Lucida Sans Unicode;'+
            'font-size: 13.5px;">'+
            'Não está contemplado nesta proposta: '+
            '</div><br>' +

            '<div style=" margin-left: 1.25cm;'+
            'margin-right: 1.25cm;'+
            'background-color: #00b050;'+
            'color: #ffffff;'+
            'border-style: solid;'+
            'border-width: 1px;'+
            'font-size: 16px;'+
            'height: 30px;'+
            'font-family:Lucida Sans Unicode;'+
            'font-weight:bold;'+
            'line-height:30px;">&nbsp; 5.\tAdicional</div>'+
            '<br><div style="margin-left: 1.65cm;'+
            'margin-right: 1.65cm;'+
            'font-family:Lucida Sans Unicode;'+
            'font-size: 13.5px;">'+
            'Não há.'+
            '</div><br>' +

            '<div style=" margin-left: 1.25cm;'+
            'margin-right: 1.25cm;'+
            'background-color: #00b050;'+
            'color: #ffffff;'+
            'border-style: solid;'+
            'border-width: 1px;'+
            'font-size: 16px;'+
            'height: 30px;'+
            'font-family:Lucida Sans Unicode;'+
            'font-weight:bold;'+
            'line-height:30px;">&nbsp; 6.\tEquipe de Trabalho</div>'+
            '<br><div style="margin-left: 1.65cm;'+
            'margin-right: 1.65cm;'+
            'font-family:Lucida Sans Unicode;'+
            'font-size: 13.5px;">'+
            'Neste projeto estarão envolvidos a seguinte equipe:'+
            '</div><br>' +

            '<div style=" margin-left: 1.25cm;'+
            'margin-right: 1.25cm;'+
            'background-color: #00b050;'+
            'color: #ffffff;'+
            'border-style: solid;'+
            'border-width: 1px;'+
            'font-size: 16px;'+
            'height: 30px;'+
            'font-family:Lucida Sans Unicode;'+
            'font-weight:bold;'+
            'line-height:30px;"> &nbsp; 7.\tTempo de Execução </div>'+
            '<br><div style="margin-left: 1.65cm;'+
            'margin-right: 1.65cm;'+
            'font-family:Lucida Sans Unicode;'+
            'font-size: 13.5px;">'+
            'O sistema será implementado em até <strong>X</strong> dias úteis após o início, considerando o desenvolvimento em paralelo com a equipe listada no item anterior.<br>\n' +
            '\n' +
            '<br>Para melhor entendimento, segue abaixo a estimativa de trabalho por atividade:\n'+
            '</div><br>' +

            '<div><table style="width: 100%;font-size: 14px;margin: 0px auto; background-color: #e2efda;">' +
            '<table border="0" cellspacing="0" cellpadding="0" width="623"">' +
            '<tr>\n' +
            '<td style="background-color: #548235;"><span style="color: #ffffff;"><strong>#</strong></span></td>\n' +
            '<td style="background-color: #548235;"><span style="color: #ffffff;"><strong>Categoria</strong></span></td>\n' +
            '<td style="background-color: #548235;"><span style="color: #ffffff;"><strong>Descrição</strong></span></td>\n' +
            '<td style="background-color: #548235;"><span style="color: #ffffff;"><strong>Dias de trabalho</strong></span></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '<td></td>\n' +
            '</tr>\n' +
            '</table></div><br>'+
            '<pagebreak />'+

            '<div style=" margin-left: 1.25cm;'+
            'margin-right: 1.25cm;'+
            'background-color: #00b050;'+
            'color: #ffffff;'+
            'border-style: solid;'+
            'border-width: 1px;'+
            'font-size: 16px;'+
            'height: 30px;'+
            'font-family:Lucida Sans Unicode;'+
            'font-weight:bold;'+
            'line-height:30px;">&nbsp; 8.\tValor </div>'+
            '<br><div style="margin-left: 1.65cm;'+
            'margin-right: 1.65cm;'+
            'font-family:Lucida Sans Unicode;'+
            'font-size: 13.5px;">'+
            'R$' + budget +
            '</div><br>' +

            '<div style=" margin-left: 1.25cm;'+
            'margin-right: 1.25cm;'+
            'background-color: #00b050;'+
            'color: #ffffff;'+
            'border-style: solid;'+
            'border-width: 1px;'+
            'font-size: 16px;'+
            'height: 30px;'+
            'font-family:Lucida Sans Unicode;'+
            'font-weight:bold;'+
            'line-height:30px;"> &nbsp; 9.\tForma de Pagamento   </div>'+
            '<br><div style="margin-left: 1.65cm;'+
            'margin-right: 1.65cm;'+
            'font-family:Lucida Sans Unicode;'+
            'font-size: 13.5px;">'+
            'A.\tÀ vista: com 5% de desconto.<br><br>\n' +
            '\n' +
            'B.\tParcelado em até 03 vezes, sendo: 10, 30 e 60 dias após o aceite.\n'+
            '</div><br>' +

            '<div style=" margin-left: 1.25cm;'+
            'margin-right: 1.25cm;'+
            'background-color: #00b050;'+
            'color: #ffffff;'+
            'border-style: solid;'+
            'border-width: 1px;'+
            'font-size: 16px;'+
            'height: 30px;'+
            'font-family:Lucida Sans Unicode;'+
            'font-weight:bold;'+
            'line-height:30px;"> &nbsp; 10.\tManutenção após entrega  </div>'+
            '<br><div style="margin-left: 1.65cm;'+
            'margin-right: 1.65cm;'+
            'font-family:Lucida Sans Unicode;'+
            'font-size: 13.5px;">'+
            'Não está contemplado no escopo desta etapa.'+
            '</div><br>' +

            '<div style=" margin-left: 1.25cm;'+
            'margin-right: 1.25cm;'+
            'background-color: #00b050;'+
            'color: #ffffff;'+
            'border-style: solid;'+
            'border-width: 1px;'+
            'font-size: 16px;'+
            'height: 30px;'+
            'font-family:Lucida Sans Unicode;'+
            'font-weight:bold;'+
            'line-height:30px;"> &nbsp; 11.\tInfraestrutura (Hospedagem)  </div>'+
            '<br><div style="margin-left: 1.65cm;'+
            'margin-right: 1.65cm;'+
            'font-family:Lucida Sans Unicode;'+
            'font-size: 13.5px;">'+
            'Não está contemplado no escopo desta etapa.'+
            '</div><br>' +

            '<div style=" margin-left: 1.25cm;'+
            'margin-right: 1.25cm;'+
            'background-color: #00b050;'+
            'color: #ffffff;'+
            'border-style: solid;'+
            'border-width: 1px;'+
            'font-size: 16px;'+
            'height: 30px;'+
            'font-family:Lucida Sans Unicode;'+
            'font-weight:bold;'+
            'line-height:30px;"> &nbsp; 12.\tCDN (Content Delivery Network)  </div>'+
            '<br><div style="margin-left: 1.65cm;'+
            'margin-right: 1.65cm;'+
            'font-family:Lucida Sans Unicode;'+
            'font-size: 13.5px;">'+
            'INSERIR CDN FIXOAQUI'+
            '</div><br>' +

            '<div style=" margin-left: 1.25cm;'+
            'margin-right: 1.25cm;'+
            'background-color: #00b050;'+
            'color: #ffffff;'+
            'border-style: solid;'+
            'border-width: 1px;'+
            'font-size: 16px;'+
            'height: 30px;'+
            'font-family:Lucida Sans Unicode;'+
            'font-weight:bold;'+
            'line-height:30px;"> &nbsp; 13.\tSustentação </div>'+
            '<br><div style="margin-left: 1.65cm;'+
            'margin-right: 1.65cm;'+
            'font-family:Lucida Sans Unicode;'+
            'font-size: 13.5px;">'+
            'Não está contemplado no escopo desta etapa.'+
            '</div><br>' +

            '<div style=" margin-left: 1.25cm;'+
            'margin-right: 1.25cm;'+
            'background-color: #00b050;'+
            'color: #ffffff;'+
            'border-style: solid;'+
            'border-width: 1px;'+
            'font-size: 16px;'+
            'height: 30px;'+
            'font-family:Lucida Sans Unicode;'+
            'font-weight:bold;'+
            'line-height:30px;"> &nbsp; 14.\tValidade  </div>'+
            '<br><div style="margin-left: 1.65cm;'+
            'margin-right: 1.65cm;'+
            'font-family:Lucida Sans Unicode;'+
            'font-size: 13.5px;">'+
            'Esta proposta tem validade de 30 dias da data do seu envio.'+
            '</div><br>' ;




        tinymce.init(
            {
                selector: 'textarea',
                height: 800,
                menubar: false,
                language: 'pt_BR',
                table_grid: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor textcolor image',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code help wordcount'
                ],
                toolbar: 'insert | undo redo | formatselect | bold italic backcolor | forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | table | help',
                images_upload_base_path: url + '/',
                images_upload_handler: function (blobInfo, success, failure) {
                    var xhr, formData;

                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', '/dashboard/blog/image/upload');

                    xhr.onload = function() {
                        var json;

                        if (xhr.status != 200) {
                            failure('HTTP Error: ' + xhr.status);
                            return;
                        }

                        json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.location != 'string') {
                            failure('Invalid JSON: ' + xhr.responseText);
                            return;
                        }

                        success(json.location);
                    };
                    if(blobInfo.blob().size <= 2097152){

                        formData = new FormData();

                        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                        formData.append('file', blobInfo.blob(), blobInfo.filename());

                        xhr.send(formData);

                    }else{
                        alert('Erro ao fazer upload (tamanho limite da imagem: 2MB). Recarregue a página.');
                    }
                },
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tinymce.com/css/codepen.min.css'],

                setup: function (editor) {
                    editor.on('init', function () {
                        this.setContent(layout);
                    });
                }

            });

        }

    </script>
@endsection