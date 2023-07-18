<?php

namespace App\Http\Controllers;
use App\Contracts\VendedorRepoInterface;

use Illuminate\Http\Request;

class VendedorController extends Controller
{   
    private $vendedorRepo;

    public function __construct(VendedorRepoInterface $vendedorRepo)
    {
        $this->vendedorRepo = $vendedorRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $vendedores = $this->vendedorRepo->allVendedor();

        return view('vendedores.all-vendedor', compact('vendedores'));
    }

    public function allLucroTotal()
    {
        $vendedores = $this->vendedorRepo->allVendedor();

        return view('financeiro.lucro-total', compact('vendedores'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendedores.add-vendedor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->vendedorRepo->createVendedor($request);

        return redirect()->route('vendedor.create')->with('msg', 'Cadastrado!');
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
        //
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
        $this->vendedorRepo->destroyVendedor($id);
       
        return redirect()->route('vendedor.all')->with('msg-red', 'Excluido!');
    }
}
