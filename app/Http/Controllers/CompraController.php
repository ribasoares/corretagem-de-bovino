<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\CompraRepoInterface;
use App\Contracts\FormaPagRepoInterface;
use App\Contracts\FornecedorRepoInterface;

class CompraController extends Controller
{
    private $compraRepo;
    private $fornecedorRepo;
    private $formaPagRepo;

    public function __construct(CompraRepoInterface $compraRepo, FornecedorRepoInterface $fornecedorRepo, FormaPagRepoInterface $formaPagRepo)
    {
        $this->compraRepo = $compraRepo;
        $this->fornecedorRepo = $fornecedorRepo;
        $this->formaPagRepo = $formaPagRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comprasCompletas()
    {
        $compras = $this->compraRepo->ComprasCompletas();

        return view('compra.compras-completas', compact('compras'));
    }

    public function comprasIncompletas()
    {
        $compras = $this->compraRepo->ComprasIncompletas();

        return view('compra.compras-incompletas', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $fornecedores = $this->fornecedorRepo->allFornecedor();

        return view('compra.add-compra', compact('fornecedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $compra = $this->compraRepo->createCompra($request);

      // dd($compra);

        

        return redirect()->route('compra.create')->with('msg', 'Cadastrada com SUCESSO!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra = $this->compraRepo->findCompra($id);

        return view('compra.show-compra', compact('compra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compra = $this->compraRepo->findCompra($id);
        $formaPags = $this->formaPagRepo->allFormaPag();

        return view('compra.edit-compra', compact('compra', 'formaPags'));
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
        $this->compraRepo->updateCompra($request, $id);

        return redirect()->to('/compra/edit/'.$id)->with('msg','Adicionado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->compraRepo->destroyCompra($id);
       
        return redirect()->route('compra.all')->with('msg-red', 'Excluida!');
    }
}
