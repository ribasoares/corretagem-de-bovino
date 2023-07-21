<?php

namespace App\Http\Controllers;
use App\Contracts\FormaPagRepoInterface;
use App\Contracts\FinanceiroRepoInterface;

use Illuminate\Http\Request;

class FinanceiroController extends Controller
{
    private $financeiroRepo;
    private $formaPagRepo;
   
    public function __construct(FinanceiroRepoInterface $financeiroRepo, FormaPagRepoInterface $formaPagRepo)
    {
        $this->financeiroRepo = $financeiroRepo;
        $this->formaPagRepo = $formaPagRepo;
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allPagar()
    {   
        $pagarContas = $this->financeiroRepo->allComprasPagar();

        return view('financeiro.pagar_conta', compact('pagarContas'));
    }

    public function allPagas()
    {   
        $pagarContas = $this->financeiroRepo->allComprasPagas();

        return view('financeiro.contas-pagas', compact('pagarContas'));
    }


    public function allRecebidas()
    {   
        
        $receberContas = $this->financeiroRepo->allVendasRecebidas();
        
        return view('financeiro.contas-recebidas', compact('receberContas'));
        
        

    }   

    public function allReceber()
    {   
        $receberContas = $this->financeiroRepo->allVendasReceber();

        return view('financeiro.receber-conta', compact('receberContas'));
    }

    public function allLucro()
    {   
        $lucros = $this->financeiroRepo->allLucro();

        return view('financeiro.lucro', compact('lucros'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPagar($id)
    {
        $pagarConta = $this->financeiroRepo->findPagarConta($id);
        $formaPags = $this->formaPagRepo->allFormaPag();
        

        return view('financeiro.pagamento', compact('pagarConta', 'formaPags'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePagar(Request $request, $id)
    {
        $this->financeiroRepo->updatePagarConta($request, $id);

        return redirect()->to('/Pagar-Conta/edit/'.$id)->with('msg','Pagamento Adicionado!');
    }

    public function editReceber($id)
    {
        $receberConta = $this->financeiroRepo->findReceberConta($id);
        $formaPags = $this->formaPagRepo->allFormaPag();
        

        return view('financeiro.recebimento', compact('receberConta', 'formaPags'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateReceber(Request $request, $id)
    {
        $this->financeiroRepo->updateReceberConta($request, $id);

        return redirect()->to('/Receber-Conta/edit/'.$id)->with('msg','Pagamento Adicionado!');
    }

    public function updateLucro(Request $request, $id)
    {
        $this->financeiroRepo->updateLucro($request, $id);

        return redirect()->route('financeiro.allLucro')->with('msg','Pagamento Adicionado!');
    }

   
}
