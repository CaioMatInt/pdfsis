@extends('layouts.dashboard')

@section('pageTitle', $pageTitle)

@section('content')

    <?php

    try{
        $propNumber = $lastProposalNumber->control_proposal;
    }catch (Exception $exception){
        $propNumber = null;
    }
        if ($propNumber != NULL){
            //Incrementar proposta
            //TODO: pensar em maneira mais inteligente e escalável
        if ($propNumber == 'PropostaEV_201899'){
            $propNumber = 'PropostaEV_2018100';
        };
        if ($propNumber == 'PropostaEV_2018199'){
            $propNumber = 'PropostaEV_2018200';
        };
        if ($propNumber == 'PropostaEV_2018299'){
            $propNumber = 'PropostaEV_2018300';
        };
        if ($propNumber == 'PropostaEV_2018399'){
            $propNumber = 'PropostaEV_2018400';
        };
        if ($propNumber == 'PropostaEV_2018399'){
                $propNumber = 'PropostaEV_2018400';
        };

        $propNumber++; }

     ?>



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
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title">Título</label>
                                <input type="text" class="form-control" name="title" id="title" value="<?php if (isset($contract->title))
                                { echo $contract->title;} else { ?>{{ old('title') }} <?php } ?>">
                            @if ($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('control_proposal') ? 'has-error' : '' }}">
                                <label for="control_proposal">Número da proposta</label>
                                <input disabled type="text" class="form-control" name="control_proposal" id="control_proposal"
                                       value="<?php if (isset($contract->control_proposal)){ echo $contract->control_proposal;}
                                       else if($propNumber != NULL){echo $propNumber; }
                                       else if($propNumber == NULL){echo 'PropostaEV_201860';}
                                       ?>">
                                @if ($errors->has('control_proposal'))
                                    <span class="help-block">{{ $errors->first('control_proposal') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('control_proposal') ? 'has-error' : '' }}">
                                <input type="hidden" class="form-control" name="control_proposal" id="control_proposal"
                                       value="<?php if (isset($contract->control_proposal)){ echo $contract->control_proposal;}
                                       else if($propNumber != NULL){echo $propNumber; }
                                       else if($propNumber == NULL){echo 'PropostaEV_201860';}
                                       ?>">
                                @if ($errors->has('control_proposal'))
                                    <span class="help-block">{{ $errors->first('control_proposal') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('version') ? 'has-error' : '' }}">
                                <label for="version">Versão</label>
                                <input type="number" step=any  class="form-control" name="version" id="version" value="<?php if
                                (isset($contract->version)) { echo $contract->version;} else { ?>1<?php } ?>">
                                @if ($errors->has('version'))
                                    <span class="help-block">{{ $errors->first('version') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                                <label for="area">Área</label>
                                <select id="area" class="form-control" name="area">
                                <?php if(isset($contract->area)) { echo "<option selected>$contract->area</option>"; } ?>
                                    <option>Desenvolvimento</option>
                                    <option>Infraestrutura</option>
                                    <option>Segurança da Informação</option>
                                    <option>Cloud</option>
                                </select>
                                @if ($errors->has('area'))
                                    <span class="help-block">{{ $errors->first('area') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('budget') ? 'has-error' : '' }}">
                                <label for="budget">Valor</label>
                                <input type="number" step=any class="form-control" name="budget" id="budget" value="<?php if
                                (isset($contract->budget)) { echo $contract->budget;} else { ?>{{old('budget')}}<?php } ?>">
                                @if ($errors->has('budget'))
                                    <span class="help-block">{{ $errors->first('budget') }}</span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('proposal') ? 'has-error' : '' }}">
                                        <label for="proposal">Proposta Comercial</label>
                                        <textarea class="form-control" name="proposal" id="proposal" value="<?php if
                                        (isset($contract->proposal)) { echo $contract->proposal;} else { ?>{{old('proposal')}}<?php } ?>">
                                        </textarea>
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
                            <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                                <label for="client_id"></label>
                                <input type="hidden" class="form-control" name="client_id" id="client_id" value="{{$client->id}}">
                                @if ($errors->has('client_id'))
                                    <span class="help-block">{{ $errors->first('client_id') }}</span>
                                @endif
                            </div>
                </form>
                         </div>

            </div></section>
        </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/plugins/tinymce/tinymce.min.js') }}"></script>
    <script>
        document.getElementById('control_proposal').onkeydown = function(e){
            e.preventDefault();
        }


    </script>
    <script>

        function initContract(){
            let title = document.getElementById("title").value;
            let budget = document.getElementById("budget").value;
            let control_proposal = document.getElementById("control_proposal").value;
        let layout = '<br><br><br><div style="text-align:center;\n' +
            'font-family:Lucida Sans Unicode;\n' +
            'font-size:20pt;\n' +
            'font-weight:bold;">PROPOSTA COMERCIAL</div>'+
            '<div style="width: 100%;\n' +
            'height: 160px;\n' +
            'margin-left: auto; margin-right: auto; display: block;"><div style="display: block; text-align: center;"><img src=\'<?php echo "$client->image"; ?>\'></div> </div>'+
            '<p style="text-align:center;\n' +
            'font-family:Lucida Sans Unicode;\n' +
            'font-size:16pt;\n' +
            'font-weight:bold;"><span id="contract-title">' + title + '</span></p>'+
             '<div style="text-align: center">(' + control_proposal +')</div>' +
            '<br><br><br><br><br>'+
            '<br>'+
            '<div style="line-height: 0.5; margin-left: 1.25cm; margin-right: 1.25cm;"><p>A/C</p><p><strong>Razão social:</strong> <?php echo "$client->company"; ?></p>'+
            '<p><strong>CNPJ:</strong> <?php echo "$client->cnpj"; ?></p>'+
            '<p><strong>Telefone:</strong> <?php echo "$client->phone"; ?></p>'+
            '<p><strong>Endereço:</strong> <?php echo "$client->address"; ?></p>'+
            '<p><strong>Nome do contato:</strong> <?php echo "$client->contact_name"; ?></p>'+
            '<p><strong>E-mail:</strong> <?php echo "$client->email"; ?></p>'+
            '</div>'+
            '<tocpagebreak />'+
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
            'line-height:30px;"> &nbsp; <tocentry content="01.\tObjeto – Serviço Solicitado" />1.	Objeto – Serviço Solicitado</div>'+
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
            '&nbsp; 2. Descrição do Serviço</div><tocentry content="02. Descrição do Serviço" />'+
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
            '</table></div><br>'+

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
            'line-height:30px;"> &nbsp; 3.\tPré requisitos  </div><tocentry content="03. Pré Requisitos" />'+
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
            'line-height:30px;"> &nbsp; 4.\tExceções </div><tocentry content="04. Exceções" />'+
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
            'line-height:30px;">&nbsp; 5.\tAdicional</div><tocentry content="05. Adicional" />'+
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
            'line-height:30px;">&nbsp; 6.\tEquipe de Trabalho</div><tocentry content="06. Equipe de Trabalho" />'+
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
            'line-height:30px;"> &nbsp; 7.\tTempo de Execução </div><tocentry content="07. Tempo de Execução" />'+
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
            '</table></div><br>' +


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
            'line-height:30px;">&nbsp; 8.\tValor </div><tocentry content="08. Valor" />'+
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
            'line-height:30px;"> &nbsp; 9.\tForma de Pagamento   </div><tocentry content="09. Forma de Pagamento" />'+
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
            'line-height:30px;"> &nbsp; 10.\tManutenção após entrega  </div><tocentry content="10. Manutenção após entrega" />'+
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
            'line-height:30px;"> &nbsp; 11.\tInfraestrutura (Hospedagem)  </div><tocentry content="11. Infraestrutura" />'+
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
            'line-height:30px;"> &nbsp; 12.\tCDN (Content Delivery Network)  </div><tocentry content="12. CDN (Content Delivery Network)" />'+
            '<br><div style="margin-left: 1.65cm;'+
            'margin-right: 1.65cm;'+
            'font-family:Lucida Sans Unicode;'+
            'font-size: 13.5px;">'+
            '<p>A utilização de CDN é recomendável para todos os sites, proporcionando performance e redução de custos com os players.</p>\n' +
            '<p>Segue abaixo dois orçamentos para cada site:</p>\n' +
            '<p>CDN – Every System &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>R$ 59.99/mês</strong></p>\n' +
            '<p>Amazon CloudFront &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong>USD: 120.90/mês</strong></p>'+
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
            'line-height:30px;"> &nbsp; 13.\tSustentação </div><tocentry content="13. Sustentação" />'+
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
            'line-height:30px;"> &nbsp; 14.\tValidade  </div><tocentry content="14. Validade" />'+
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
                valid_elements : '*[*]',
                table_grid: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor textcolor image',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code help wordcount'
                ],
                toolbar: 'insert | undo redo | formatselect | bold italic backcolor | forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | table | help | code',
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