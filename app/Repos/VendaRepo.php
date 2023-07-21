<?php

namespace App\Repos;

use App\Models\Venda;
use App\Models\Estoque;
use App\Models\Lucro;
use App\Models\Vendedor;
use App\Models\ReceberConta;
use App\Models\FormaPagamento;

use App\Contracts\VendaRepoInterface;
use DB;

class VendaRepo implements VendaRepoInterface 
{
    protected $model;
    protected $estoque;
    protected $receberConta;
    protected $formaPag;
    protected $lucro;
    protected $vendedor;
   
    public function __construct(Venda $model, Estoque $estoque, ReceberConta $receberConta, 
        FormaPagamento $formaPag, Lucro $lucro, Vendedor $vendedor)
    {
        $this->model = $model;
        $this->estoque = $estoque;
        $this->receberConta = $receberConta;
        $this->formaPag = $formaPag;
        $this->lucro = $lucro;
        $this->vendedor = $vendedor;
       
    }

    public function allVendaHome()
    {
        return $this->model->all();
    }

    public function allVenda()
    {
        return $this->model->orderBy('venda_data', 'desc')->paginate(5);
    }


    public function createVenda($request)
    {   


        try{ 
            DB::beginTransaction();

            // Tabela VENDA
            $venda = $request->only($this->model->getFillable());
            $venda['valor_receber'] = $request->venda_peso * $request->venda_valor_kg;
            $venda['venda_data'] = date('Y-m-d', strtotime($request->venda_data));
            $vendaEfetuada = $this->model->create($venda);

            // Tabela  PAGAR CONTA
            $receberConta = $request->only($this->receberConta->getFillable());
            $receberConta['valor_receber'] = $request->venda_peso * $request->venda_valor_kg;
            $receberConta['valor_aberto'] = $request->venda_peso * $request->venda_valor_kg;
            $receberConta['receber_conta_data'] = date('Y-m-d', strtotime($vendaEfetuada->venda_data));
            $receberConta['venda_id'] = $vendaEfetuada->id;
            $receber =$this->receberConta->create($receberConta);
            
            // Tabela descontar ESTOQUE
            $estoque = $vendaEfetuada->estoque;   
            $estoque['quant_disponivel'] = $estoque->quant_disponivel - $vendaEfetuada->venda_quantidade;
            $estoque->save();

            // Tabela LUCRO
            $datalucro = $request->only($this->lucro->getFillable());
            $datalucro['lucro_total'] = $request->venda_peso * $request->lucro_KG;
            $datalucro['lucro_data'] = date('Y-m-d', strtotime($vendaEfetuada->venda_data));
            $datalucro['venda_id'] = $vendaEfetuada->id;
            $data = $this->lucro->create($datalucro);

            // Tabela LUCROS TOTAIS
            $vendedor = $data->vendedor;
            $vendedor['lucro_total'] = $vendedor->lucro_total + $data->lucro_total;
            $vendedor['lucro_total_aberto'] = $vendedor->lucro_total_aberto + $data->lucro_total;
            $vendedor->save();
           
           //dd($vendedor);


            DB::commit();  
                        
            // Se o cadastro foi concluido, ok!
           // return redirect()->route('venda.create')->with('msg','venda cadastrada com SUCESSO!');  
    
        }catch(\Exception $e){

            // Se deu algum erro, volta tudo.
            DB::rollback();
            throw new \Exception($e->getMessage());
           // return redirect()->route('venda.store')->with('red-msg','Ops! Algo de errado aconteceu!');
          
        }

          
    }


    public function findVenda($id)
    {
        return $this->model->find($id);
    }


    public function updateVenda($request, $id)
    {
        // Paga e atualiza pela 'Ação' ATUALIZAR

        $venda = $this->model->find($id);
     
        //Se estiver devendo 'parcela(1)' e não alterar a coluna 'recebimento_valor' caso esteja vazia
        // forma_pagamento_id é adiiconado através do front(no FORMULARIO)
        if( $request->recebimento_valor <= $venda->valor_aberto && $request->recebimento_valor >= 1)          
        {     
             
            // Cria o' recebimento_valor'                                     

            $datarecebimento = $request->only($this->recebimento->getFillable());
            $datarecebimento['recebimento_valor'] = $request->recebimento_valor;      
            $datarecebimento['venda_id'] = $venda->id;          
            $receb = $this->recebimento->create($datarecebimento); 

            // Subtrai o 'recebimento_valor' pelo 'valor da parcela';
            $venda->valor_aberto = $venda->valor_aberto - $receb->recebimento_valor; 

            // Se o valor da parcela for '0 reais', status se torna 0('pago').
            if($venda->valor_aberto == 0){
                $venda->status = 0;
            }   
  
        
        } 

        $venda->save();
         

       
    }


    public function destroyVenda($id)
    {  
          // Apagar lucro total, pois ele não tem nenhum relacionamento direto para ser exlcuido       
        $lucro = $this->lucro->find($id);
        $model = $this->model->find($id);
        
        $vendedor = $lucro->vendedor;
        $vendedor['lucro_total'] = $vendedor->lucro_total - $lucro->lucro_total;
        $vendedor['lucro_total_aberto'] = $vendedor->lucro_total_aberto - $lucro->lucro_total;
        $vendedor->save();

        $estoque = $model->estoque;
        $estoque['quant_disponivel'] = $estoque->quant_disponivel + $model->venda_quantidade;
        $estoque->save();

       // dd($vendedor);

       return $this->model->find($id)->delete();

    }
}

