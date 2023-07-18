<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\FormaPagRepoInterface;

class FormaPagController extends Controller
{   
    private $formaPagRepo;

    public function __construct(FormaPagRepoInterface $formaPagRepo)
    {
        $this->formaPagRepo = $formaPagRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $formaPags = $this->formaPagRepo->allFormaPag();
        return view('forma_pagamento.add-forma-pag', compact('formaPags'));

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->formaPagRepo->createFormaPag($request);

       return redirect()->route('formaPag.create')->with('msg', 'Cadastro com SUCESSO!');
       
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->formaPagRepo->destroyFormaPag($id);
       
       return redirect()->route('formaPag.create')->with('msg-red', 'Excluido!');
    }
}
