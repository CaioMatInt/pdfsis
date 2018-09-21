<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'pageTitle' => 'Clientes cadastrados',
            'clients' => Client::all()
        ];

        return view('dashboard.client.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'pageTitle' => 'Criar novo cliente'
        ];

        return view('dashboard.client.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'company' => 'required|string||unique:clients,company',
                'cnpj' => 'required|string|unique:clients,cnpj',
                'phone' => 'required|string',
                'address' => 'required|string',
                'contact_name' => 'required|string',
                'email' => 'required|email|unique:clients,email'
            ]);

        Client::create($request->all());

        $msg = [
            'type' => 'success',
            'text' => 'Cliente ' . $request->company . ' cadastrado com sucesso',
        ];
        return redirect()->route('clients.index')->with('msg', $msg);



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
        $clients = Client::find($id);

        $data = [
            'pageTitle' => 'Editar cliente - ' . $clients->company,
            'clients' => $clients
        ];

        return view('dashboard.client.edit', $data);
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

        $request->validate(
            [
                'company' => 'required|string',
                'cnpj' => 'required|string|unique:clients,cnpj,'.$id,
                'phone' => 'required|string',
                'address' => 'required|string',
                'contact_name' => 'required|string',
                'email' => 'required|email|unique:clients,email,'.$id
            ]);

        Client::find($id)->update($request->all());

        return redirect()->route('clients.index');
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

        $this->authorize('delete', Client::class);

        $cliente = Client::find($id);

        $msg = [
            'type' => 'success',
            'text' => 'Cliente ' . $cliente->company . ' removido com sucesso',
        ];

        if(!$cliente){
            $msg = [
                'type' => 'danger',
                'text' => 'Cliente não encontrado',
            ];
            return redirect()->route('clients.index');
        } else{
        $cliente->delete();
            return redirect()->route('clients.index')->with('msg', $msg);

        }
    }
}
