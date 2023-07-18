<?php

namespace App\Repos;

use App\Models\Compra;
use App\Models\Estoque;
use App\Models\PagarConta;
use App\Models\AtualizarCompra;

use App\Contracts\CompraRepoInterface;
use DB;

class CompraRepo implements CompraRepoInterface 
{
    protected $model;
    protected $estoque;
    protected $pagarConta;
    protected $atualizarCompra;
   
    public function __construct(Compra $model, Estoque $estoque, 
        PagarConta $pagarConta, AtualizarCompra $atualizarCompra)
    {
        $this->model = $model;
        $this->estoque = $estoque;
        $this->pagarConta = $pagarConta;
        $this->atualizarCompra = $atualizarCompra;
       
    }

    public function allCompra()
    {
        return $this->model->all();
    }

    public function allEstoque()
    {   
        
        return $this->estoque->all();
    }


    public function createCompra($request)
    {

        try{ 
            DB::beginTransaction();

            $compra = $request->only($this->model->getFillable());            
            $compra['compra_totalPagar'] = $request->compra_pesoTotal * $request->compra_valor_kg; 
            $compra['compra_data'] = date('Y-m-d', strtotime($request->compra_data));

            if($compra['status'] == 1) {
                 
                $compra['compra_estoque'] = $request->compra_quantidade; 
            }

            $compraEfetuada = $this->model->create($compra);
           
            // dd($compraEfetuada);

            // Adiciona ao Financeiro "Pagar Conta"
            $pagarConta = $request->only($this->pagarConta->getFillable());
            $pagarConta['valor_pagar'] = $request->compra_pesoTotal * $request->compra_valor_kg;
            $pagarConta['valor_aberto'] = $request->compra_pesoTotal * $request->compra_valor_kg;
            $pagarConta['pagar_conta_data'] = date('Y-m-d', strtotime($compraEfetuada->compra_data));
            $pagarConta['status'] = 1;
            $pagarConta['compra_id'] = $compraEfetuada->id;
            $pagar = $this->pagarConta->create($pagarConta);
            
            // Adiciona ao Estoque para VENDA
            $estoque = $request->only($this->estoque->getFillable());
            $estoque['compra_id'] = $compraEfetuada->id;
            $estoque['quant_disponivel'] = $compraEfetuada->compra_quantidade;
            // $estoque['compra_valorKG'] = $compraEfetuada->compra_valor_kg;
            $this->estoque->create($estoque);
    
            // dd($pagar); 

            DB::commit();  
                        
            // Se o cadastro foi concluido, ok!
            return redirect()->route('compra.create')->with('msg','Compra cadastrada com SUCESSO!');  
    
        }catch(\Exception $e){

            // Se deu algum erro, volta tudo.
            DB::rollback();
            throw new \Exception($e->getMessage());
            return redirect()->route('compra.store')->with('red-msg','Ops! Algo de errado aconteceu!');
          
        }

          
    }


    public function findCompra($id)
    {
        return $this->model->find($id);
    }

    public function findEstoque($id)
    {   
    
        return $this->estoque->find($id);
    }


    public function updateCompra($request, $id)
    {
        // Paga e atualiza pela 'Ação' ATUALIZAR

        $compra = $this->model->find($id);
        $pagarConta = $this->pagarConta->find($id);
    
        //Se estiver devendo 'parcela(1)' e não alterar a coluna 'pagamento_valor' caso esteja vazia
         // forma_pagamento_id é adiiconado através do front(no FORMULARIO)
    
             
            // Cria o' pagamento_valor'                                     
        if($compra->status = 1){

            // Atualização / Adicionar compra
            $dataAtualizar = $request->only($this->atualizarCompra->getFillable());
            $dataAtualizar['valor_pagar'] = $request->peso_total * $request->valor_kg;      
            $dataAtualizar['compra_id'] = $compra->id;
            $atualizar = $this->atualizarCompra->create($dataAtualizar); 
    
            // Envio de dados para Tabela COMPRA
            $compra->compra_totalPagar = $compra->compra_totalPagar + $atualizar->valor_pagar; 
            $compra->compra_pesoTotal = $compra->compra_pesoTotal + $atualizar->peso_total;
            $compra->compra_estoque = $compra->compra_estoque - $atualizar->quantidade; 
            
            // Pagar Conta
            $pagarConta->valor_pagar = $pagarConta->valor_pagar + $atualizar->valor_pagar; 
            $pagarConta->valor_aberto = $pagarConta->valor_aberto + $atualizar->valor_pagar;
            $pagarConta->save(); 
    
            // Se o valor da parcela for '0 reais', status se torna 0('pago').
            if($compra->compra_estoque == 0){
                $compra->status = 0;
            }   
            


        }
     
        
        $compra->save();

       
        
    
    }


    public function destroyCompra($id)
    {
        return $this->model->find($id)->delete();
    }
}

