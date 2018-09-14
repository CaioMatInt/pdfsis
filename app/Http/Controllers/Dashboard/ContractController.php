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
        $html = "<p><img src=\"http://i64.tinypic.com/im2eth.png\" width=\"145\" height=\"47\"/>
    <hr>    <br>    <br>
    <p class=\"titulo\">PROPOSTA COMERCIAL</p>
    <p class=\"subtitulo\">$contract->title</p>
    <p class='testebottom'>zdiojfdsoi</p>
    
    
";

            $mpdf->SetDisplayMode('fullpage');
            $css = \Illuminate\Support\Facades\File::get(storage_path('css\pdfstyle.css'));
            $mpdf->WriteHTML($css,1);
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit;


    }

    public function teste(){
        return view('dashboard.contract.teste');

    }
}
