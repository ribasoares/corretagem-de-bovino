<?php

namespace App\Http\Controllers;

use App\Contracts\FornecedorRepoInterface;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{   
    private $fornecedorRepo;

    public function __construct(FornecedorRepoInterface $fornecedorRepo)
    {
        $this->fornecedorRepo = $fornecedorRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $fornecedores = $this->fornecedorRepo->allFornecedor();

        return view('fornecedores.all-fornecedor', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fornecedores.add-fornecedor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->fornecedorRepo->createFornecedor($request);

        return redirect()->route('fornecedor.create')->with('msg', 'Cadastrado com SUCESSO!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fornecedor  $Fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fornecedor  $Fornecedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fornecedor  $Fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedor  $Fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $this->fornecedorRepo->destroyFornecedor($id);
       
        return redirect()->route('fornecedor.all')->with('msg-red', 'Excluido!');
    }
}
