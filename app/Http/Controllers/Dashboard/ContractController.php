<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Contract;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'pageTitle' => 'Contratos cadastrados',
            'contracts' => Contract::all(),
            'clients' => Client::all()
        ];

        return view('dashboard.contract.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $clientArray)
    {
        $data = [
            'pageTitle' => 'Criar novo contrato',
            'client' => $clientArray
        ];

        return view('dashboard.contract.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Contract::create($request->all());
        $msg = [
            'type' => 'success',
            'text' => 'Contrato ' . $request->title . ' cadastrado com sucesso',
        ];
        return redirect()->route('contracts.index')->with('msg', $msg);


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contracts = Contract::find($id);

        $data = [
            'pageTitle' => 'Editar contrato - ' . $contracts->title,
            'contracts' => $contracts
        ];

        return view('dashboard.contract.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Contract::find($id)->update($request->all());

        return redirect()->route('contracts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->authorize('delete', Contract::class);

        try {
        $contracts = Contract::find($id);
        $contracts->delete();
        $msg = [
            'type' => 'success',
            'text' => 'Contrato ' . $contracts->title . ' removido com sucesso',
        ];

            return redirect()->route('contracts.index')->with('msg', $msg);
        }
        catch (\Exception $e){


            $msg = [
                'type' => 'danger',
                'text' => 'Contrato não encontrado',
            ];
            return redirect()->route('contracts.index')->with('msg', $msg); }
        }


    public function print($id)
    {
        $contract = Contract::find($id);
        $lol = Storage::url('images/everylogo.png');

        //Converter created_at para formato BR para imprimir no contrato
        $dateBR = $contract->created_at->toDateString();
        $dateBR = str_replace("/", "-", $dateBR);
        $dateBR = date('d-m-Y', strtotime($dateBR));


        $mpdf = new \Mpdf\Mpdf(['debug' => true]);

        $pagina = "$contract->proposal";
        /*$pagina1 = "

<body><br><br><div class='pagina'><br><div class='titulo'>PROPOSTA COMERCIAL</div>
    <div class='imagemcontrato'>$contract->image</div>
    <p class='subtitulo'>$contract->title</p>
    <div class='espacamento-titulo'></div>
    <br>
    A/C
    <div class='cliente'><p><strong>Razão social:</strong> CRIAH COMUNICAÇÃO LTDA.</p>   
        <p><strong>CNPJ:</strong> 12.600.032/0001-07</p>
        <p><strong>Telefone:</strong> (11) 3500-5055</p>        
        <p><strong>Endereço:</strong> Rua Viscondessa de Campinas, 546 - Nova Campinas, Campinas - SP</p>
        <p><strong>Nome do contato:</strong> João Marcos Soré de Morais</p>
        <p><strong>E-mail:</strong> joao.marcos@criah.com.br</p>
        </div>
</div></body>";

        $pagina3 = "
        <div class='retanguloverde'> &nbsp; 1.	Objeto – Serviço Solicitado</div>    
        <br>
        $contract->object
        <br>
        
        <br><div class='retanguloverde'> &nbsp; 2.	Descrição do Serviço </div><br>
        
        <br><div class='texto'>
        $contract->description
        </div><br>
        
        <br><div class='retanguloverde'> &nbsp; 3.	Pré requisitos  </div><br>
        
        <br><div class='texto'>
        $contract->requiriments
        </div><br>
        
        <br><div class='retanguloverde'> &nbsp; 4.	Exceções </div><br>
        
        <br><div class='texto'>
        $contract->exceptions
        </div><br>
        
        <br><div class='retanguloverde'> &nbsp; 5.	Adicional </div><br>
        
        <br><div class='texto'>
        $contract->additional
        </div><br>
        
        <br><div class='retanguloverde'> &nbsp; 6.	Equipe de Trabalho </div><br>
        
        <br><div class='texto'>
        $contract->team
        </div><br>
        
        <br><div class='retanguloverde'> &nbsp; 7.	Tempo de Execução </div><br>
        
        <br><div class='texto'>
        $contract->deadline
        </div><br>
        
        <br><div class='retanguloverde'> &nbsp; 8.	Valor </div><br>
        
        <br><div class='texto'>
        $contract->budget
        </div><br>
        
        <br><div class='retanguloverde'> &nbsp; 9.	Forma de Pagamento </div><br>
        
        <br><div class='texto'>
        $contract->payment_options
        </div><br>
        
        <br><div class='retanguloverde'> &nbsp; 10.	Manutenção após entrega </div><br>
        
        <br><div class='texto'>
        $contract->maintenance
        </div><br>
        
        <br><div class='retanguloverde'> &nbsp; 11.	Infraestrutura (Hospedagem) </div><br>
        
        <br><div class='texto'>
        $contract->infra
        </div><br>
        
        <br><div class='retanguloverde'> &nbsp; 12.	CDN (Content Delivery Network) </div><br>
        
        <br><div class='texto'>
        $contract->sustentation
        </div><br>
        
        <br><div class='retanguloverde'> &nbsp; 13.	Sustentação </div><br>
        
        <br><div class='texto'>
        <p>A utilização de CDN é recomendável para todos os sites, proporcionando performance e redução de custos com os players. Segue abaixo dois orçamentos para cada site:</p>
        <p><strong>CDN – Every System</strong> R$ 59.99/mês></p>
        <p><strong>Amazon CloudFront</strong> USD: 120.90/mês </p>
        </div><br>
        
        <br><div class='retanguloverde'> &nbsp; 14.	Validade </div><br>
        
        <br><div class='texto'>
        $contract->expiration
        </div><br>
        
        "; */


        $footer = "<div class='rodape'><hr>
    <p><span style='color: green;'>Every System</span> – Tecnologia da Informação. &emsp;&emsp;&emsp;&emsp;&emsp;
    &emsp;&emsp;&emsp;&emsp;
    {PAGENO} <!-- funcionalidade do mpdf,insere numero da página -->  
    &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; $contract->control_proposal</p>
    <p>CNPJ: 25.463.559/0001-89 &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp; 
    &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    &emsp;&emsp;<span class='datafixo'>$dateBR</span></p>
    <p>Rua Frei Manoel da Ressurreição,1488, Sala 14,</p>
    <p>Jardim Guanabara, Campinas/SP</p> 
    </div>";

        $header = "<div class='cabecalho'><img src='http://i64.tinypic.com/im2eth.png' width='145' height='47'/>
    <hr>";

        $assinaturaRenan = "
<indexentry />assinatura
<br><br>
<div class='assinatura'><p>Atenciosamente, 
<p>
<p>Renan Fuentes - CEO </p>
<p>Tel: +55 (19) 3243-0173 </p>
<p>Cel: +55 (19) 9 9717-9845 </p>
<p>Cel: +55 (11) 9 8696-7937 </p>
</p>Site: www.everysystem.com.br </p></div>
";

      // $imgtest = "<img src='teste.png'>";
        $basepath = url('');
        $basepath = $basepath.'/';

        //$mpdf->SetDisplayMode('fullpage');
        $mpdf->setBasePath($basepath);
        $mpdf->showImageErrors = true;
        $css = \Illuminate\Support\Facades\File::get(storage_path('css\pdfstyle.css'));
        $mpdf->setAutoBottomMargin;
        $mpdf->SetHtmlFooter($footer);
        $mpdf->SetHTMLHeader($header);
        $mpdf->WriteHTML($css, 1);
        $mpdf->WriteHTML($pagina);
        $mpdf->AddPage();
        $mpdf->WriteHTML(auth()->user()->signature);
       // $mpdf->WriteHTML('<indexinsert />');
      //  $mpdf->WriteHTML($imgtest);
      //  $mpdf->Image('/sadasf.png', 0, 0, 210, 297, 'png', '', true, false);


      //  $mpdf->AddPage();
       // $mpdf->WriteHTML('<p>Índice</p>', 2);
       // $mpdf->InsertIndex('', 1, '', '');

        $mpdf->Output();
        exit;


    }

    public function teste()
    {
        return view('dashboard.contract.teste');

    }


    public function test()
    {

        $hhtml = '
<htmlpageheader name="myHTMLHeaderOdd" style="display:none">
<div style="background-color:#BBEEFF" align="center"><b>&nbsp;{PAGENO}&nbsp;</b></div>
</htmlpageheader>
<htmlpagefooter name="myHTMLFooterOdd" style="display:none">
<div style="background-color:#CFFFFC" align="center"><b>&nbsp;{PAGENO}&nbsp;</b></div>
</htmlpagefooter>
<sethtmlpageheader name="myHTMLHeaderOdd" page="O" value="on" show-this-page="1" />
<sethtmlpagefooter name="myHTMLFooterOdd" page="O" value="on" show-this-page="1" />
';
//==============================================================
        $html = '
<h1>mPDF Page Sizes</h1>
<h3>Changing page (sheet) sizes within the document</h3>
';
//==============================================================
//==============================================================
        $mpdf = new \Mpdf\Mpdf(['c', 'A4']);
       // $mpdf->WriteHTML($hhtml);
       // $mpdf->WriteHTML($html);
        $mpdf->WriteHTML('<p>This should print on an A4 (portrait) sheet</p>');
        $mpdf->WriteHTML('<tocpagebreak />');
       // $mpdf->WriteHTML($html);
        $mpdf->WriteHTML('<tocentry content="A4 landscape" />
            <p>This page appears just after the ToC and should print on an A4 (landscape) sheet</p>'
        );
        $mpdf->WriteHTML('<pagebreak sheet-size="A4" />');
   //     $mpdf->WriteHTML($html);
        $mpdf->WriteHTML('<tocentry content="A4" /><p>This should print on an A5 (landscape) sheet</p>');
        $mpdf->WriteHTML('<pagebreak sheet-size="Letter" />');
     //   $mpdf->WriteHTML($html);
        $mpdf->WriteHTML('<tocentry content="A4" /><p>This should print on an Letter sheet</p>');
        $mpdf->WriteHTML('<pagebreak sheet-size="150mm 150mm" />');
     //   $mpdf->WriteHTML($html);

        $mpdf->WriteHTML('<tocentry content="150mm square" />
            <p>This should print on a sheet 150mm x 150mm</p>');
        $mpdf->WriteHTML('<pagebreak sheet-size="11.69in 8.27in" />');
     //   $mpdf->WriteHTML($html);

        $mpdf->WriteHTML('<tocentry content="A4 landscape (ins)" />
            <p>This should print on a sheet 11.69in x 8.27in = A4 landscape</p>');

        $mpdf->WriteHTML('<pagebreak sheet-size="11.69in 8.27in" />');
    //    $mpdf->WriteHTML($html);

        $mpdf->WriteHTML('<tocentry content="Vampeta" /><p>Vampeta test</p>');
        $mpdf->WriteHTML('<tocentry content="Vampeta 2" /><p>Vampeta test 2</p>');


        $mpdf->Output();
        exit;
//==============================================================
//==============================================================

    }
}
