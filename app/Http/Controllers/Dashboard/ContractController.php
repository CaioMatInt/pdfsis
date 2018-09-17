<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Contract;
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
            'contracts' => Contract::all()
        ];

        return view('dashboard.contract.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'pageTitle' => 'Criar novo contrato'
        ];

        return view('dashboard.contract.create', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TODO: INSERIR UM TRY CATCH, POIS MSG RECEBE ANTES A CONFIRMAÇÃO

        $contracts = Contract::find($id);

        $msg = [
            'type' => 'success',
            'text' => 'Cliente ' . $contracts->title . ' removido com sucesso',
        ];

        if(!$contracts){
            $msg = [
                'type' => 'danger',
                'text' => 'Cliente não encontrado',
            ];
            return redirect()->route('clients.index')->with('msg', $msg);
        } else{
            $contracts->delete();
            return redirect()->route('clients.index')->with('msg', $msg);

        }
    }

    public function print($id){
        $contract = Contract::find($id);
        $lol = Storage::url('images/everylogo.png');

         $mpdf = new \Mpdf\Mpdf();
        $pagina1 = "

<body><div class='pagina'><div class='titulo'>PROPOSTA COMERCIAL</div>
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

            $pagina2 = "
<body>
<div class='pagina'>   
    <div class='titulo'>ÍNDICE</div>
    <p>1.	Objeto – Serviço Solicitado 3</p>
    <p>2.	Descrição do Serviço 3</p>
    <p>3.	Pré requisitos	4</p>
    <p>4.	Exceções	4</p>
    <p>5.	Adicional	4</p>
    <p>6.	Equipe de Trabalho	4</p>
    <p>7.	Tempo de Execução	5</p>
    <p>8.	Valor	6</p>
    <p>9.	Forma de Pagamento	6</p>
    <p>10.	Manutenção após entrega	6</p>
    <p>11.	Infraestrutura (Hospedagem)	6</p>
    <p>12.	CDN (Content Delivery Network)	6</p>
    <p>13.	Sustentação	6</p>
    <p>14.	Validade	6</p>
</div>
</body>
";
        $pagina3 = "<body><p class='pagina'>dasdsa</p></body>
        ";

        $pagina4 = "<body><p class='pagina'>asdas</p></body>";




        $footer = "<div class='rodape'><hr>
    <p><span style='color: green;'>Every System</span> – Tecnologia da Informação. &emsp;&emsp;&emsp;&emsp;&emsp;
    &emsp;&emsp;&emsp;&emsp;
    {PAGENO} <!-- funcionalidade do mpdf,insere numero da página -->  
    &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;Proposta_9999</p>
    <p>CNPJ: 25.463.559/0001-89 &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp; 
    &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    &emsp;&emsp;<span class='datafixo'>99/99/9999</span></p>
    <p>Rua Frei Manoel da Ressurreição,1488, Sala 14,</p>
    <p>Jardim Guanabara, Campinas/SP</p> 
    </div>";

        $header = "<div class='cabecalho'><img src='http://i64.tinypic.com/im2eth.png' width='145' height='47'/>
    <hr>";

            //$mpdf->SetDisplayMode('fullpage');
            $css = \Illuminate\Support\Facades\File::get(storage_path('css\pdfstyle.css'));
        $mpdf->setAutoBottomMargin;
            $mpdf->SetHtmlFooter($footer);
            $mpdf->SetHTMLHeader($header);
            $mpdf->WriteHTML($css,1);
            $mpdf->WriteHTML($pagina1);
            $mpdf->WriteHTML($pagina2);
            $mpdf->WriteHTML($pagina3);
            $mpdf->WriteHTML($pagina4);
            $mpdf->Output();
            exit;


    }

    public function teste(){
        return view('dashboard.contract.teste');

    }
}
