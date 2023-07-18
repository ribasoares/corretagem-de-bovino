<?php

namespace App\Http\Controllers;

use App\Contracts\ClienteRepoInterface;
use Illuminate\Http\Request;

class ClienteController extends Controller
{   
    private $clienteRepo;

    public function __construct(ClienteRepoInterface $clienteRepo)
    {
        $this->clienteRepo = $clienteRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $clientes = $this->clienteRepo->allCliente();

        return view('clientes.all-cliente', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.add-cliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $cliente = $this->clienteRepo->createCliente($request);

      // dd($cliente);

        return redirect()->route('cliente.create')->with('msg', 'Cadastrado com SUCESSO!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->clienteRepo->destroyCliente($id);
       
        return redirect()->route('cliente.all')->with('msg-red', 'Excluido!');
    }
}
