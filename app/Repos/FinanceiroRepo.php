<?php

namespace App\Repos;

use App\Models\PagarConta;
use App\Models\ReceberConta;
use App\Models\Pagamento;
use App\Models\Recebimento;
use App\Models\Lucro;
use App\Models\Vendedor;
use App\Models\FormaPagamento;

use App\Contracts\FinanceiroRepoInterface;
use DB;

class FinanceiroRepo implements FinanceiroRepoInterface 
{
    protected $pagarConta;
    protected $receberConta;
    protected $pagamento;
    protected $recebimento;
    protected $lucro;
    protected $vendedor;
    protected $formaPag;
    
  
   
    public function __construct(PagarConta $pagarConta, ReceberConta $receberConta, 
        Pagamento $pagamento, Recebimento $recebimento, FormaPagamento $formaPag, 
        Lucro $lucro, Vendedor $vendedor)
    {
        $this->pagarConta = $pagarConta;
        $this->receberConta = $receberConta;
        $this->pagamento = $pagamento; 
        $this->recebimento = $recebimento; 
        $this->lucro = $lucro;   
        $this->vendedor = $vendedor; 
        $this->formaPag = $formaPag;   
       
    }


    public function allPagarConta() 
    {
       return $this->pagarConta->all();
    }

    public function findPagarConta($id)
    {
      return $this->pagarConta->find($id);

    }

    public function updatePagarConta($request, $id)
    {
        $pagarConta = $this->pagarConta->find($id);
        $formaPag = $this->formaPag->find($id);
    
       
         // forma_pagamento_id é adiiconado através do front(no FORMULARIO)
        if( $request->pagamento_valor <= $pagarConta->valor_aberto && $request->pagamento_valor >= 1)          
        {     
             
            // Cria o' pagamento_valor'                                     

            $datapagamento = $request->only($this->pagamento->getFillable());
            $datapagamento['pagamento_valor'] = $request->pagamento_valor;
            $datapagamento['pagamento_data'] = date('Y-m-d', strtotime($request->pagamento_data));     
            $datapagamento['pagar_conta_id'] = $pagarConta->id;
            $pag = $this->pagamento->create($datapagamento); 

            // Subtrai o 'pagamento_valor' pelo 'valor da parcela';
            $pagarConta->valor_aberto = $pagarConta->valor_aberto - $pag->pagamento_valor; 

            // Se o valor da parcela for '0 reais', status se torna 0('pago').
            if($pagarConta->valor_aberto == 0){
                $pagarConta->status = 0;
            }   
  
        
        } 

        $pagarConta->save();
    }


    public function allReceberConta()
    {
        return $this->receberConta->all();
    } 

    public function findReceberConta($id)   
    {
        return $this->receberConta->find($id);
    }

    public function updateReceberConta($request, $id)
    {
        $receberConta = $this->receberConta->find($id);
    
       
         // forma_pagamento_id é adiiconado através do front(no FORMULARIO)
        if( $request->recebimento_valor <= $receberConta->valor_aberto && $request->recebimento_valor >= 1)          
        {     
             
            // Cria o' recebimento_valor'                                     

            $datarecebimento = $request->only($this->recebimento->getFillable());
            $datarecebimento['recebimento_valor'] = $request->recebimento_valor;
            $datarecebimento['recebimento_data'] = date('Y-m-d', strtotime($request->recebimento_data));     
            $datarecebimento['receber_conta_id'] = $receberConta->id;
            $receb = $this->recebimento->create($datarecebimento); 

            // Subtrai o 'recebimento_valor' pelo 'valor da parcela';
            $receberConta->valor_aberto = $receberConta->valor_aberto - $receb->recebimento_valor; 

            // Se o valor da parcela for '0 reais', status se torna 0('pago').
            if($receberConta->valor_aberto == 0){
                $receberConta->status = 0;
            }   
  
        
        } 

        $receberConta->save();
    }

    public function allLucro()
    {
        return $this->lucro->all();
    } 

    public function UpdateLucro($request, $id)
    {
        $lucropagar = $this->lucro->find($id);

        $vendedor = $lucropagar->vendedor;

        // Se o lucro aberto não 
        if(!$vendedor->lucro_total_aberto == 0)
        {
           $vendedor['lucro_total_aberto'] = $vendedor->lucro_total_aberto - $lucropagar->lucro_total;
           $vendedor->save();
    
           $lucropagar->status = 0;
           $lucropagar->save();
        }
       

       // dd($vendedor);
    } 

}   

