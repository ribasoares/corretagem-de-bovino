<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\VendedorRepoInterface;
use App\Contracts\VendaRepoInterface;
use App\Contracts\ClienteRepoInterface;
use App\Contracts\CompraRepoInterface;
use App\Contracts\FormaPagRepoInterface;

class VendaController extends Controller
{   
    private $vendaRepo;
    private $clienteRepo;
    private $compraRepo;
    private $formaPagRepo;
    private $vendedorRepo;

    public function __construct(VendaRepoInterface $vendaRepo, ClienteRepoInterface $clienteRepo, 
        CompraRepoInterface $compraRepo, FormaPagRepoInterface $formaPagRepo, VendedorRepoInterface $vendedorRepo) 
    {
        $this->vendaRepo = $vendaRepo;
        $this->clienteRepo = $clienteRepo;
        $this->compraRepo = $compraRepo;
        $this->formaPagRepo = $formaPagRepo;
        $this->vendedorRepo = $vendedorRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $vendas = $this->vendaRepo->allVenda();

        return view('venda.all-venda', compact('vendas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       
    
       $estoques = $this->compraRepo->allEstoque();       
       $clientes = $this->clienteRepo->allCliente();
       $vendedores = $this->vendedorRepo->allVendedor();
        return view('venda.add-venda', compact('clientes', 'estoques', 'vendedores'));
    
    }
        
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->vendaRepo->createVenda($request);
        return redirect()->route('venda.create')->with('msg','Cadastrada com SUCESSO!');  
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venda = $this->vendaRepo->findVenda($id);
        $formaPags = $this->formaPagRepo->allFormaPag();

        return view('venda.edit-venda', compact('venda', 'formaPags'));
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
        $this->vendaRepo->updateVenda($request, $id);

        return redirect()->to('/venda/edit/'.$id)->with('msg','Recebimento EFETUADO!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->vendaRepo->destroyVenda($id);
       
        return redirect()->route('venda.all')->with('msg-red', 'Excluida!');
    }
}
