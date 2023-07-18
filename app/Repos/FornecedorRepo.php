<?php

namespace App\Repos;

use App\Models\Fornecedor;
use App\Models\DadoFornecedor;
use App\Contracts\FornecedorRepoInterface;
use DB;

class FornecedorRepo implements FornecedorRepoInterface 
{
    protected $model;
    protected $dadoFornecedor;


    public function __construct(Fornecedor $model, DadoFornecedor $dadoFornecedor)
    {
        $this->model = $model;
        $this->dadoFornecedor = $dadoFornecedor;
    }


    public function allFornecedor()
    {
        return $this->model->all();
    }


    public function createFornecedor($request)
    {
        try{
            DB::beginTransaction();

            $fornecedor = $this->model->create($request->only($this->model->getFillable()));

            $dadoFornecedor = $request->only($this->dadoFornecedor->getFillable());
            $dadoFornecedor['fornecedor_id'] = $fornecedor->id;
            $this->dadoFornecedor->create($dadoFornecedor);

            DB::commit();               
            // Se o cadastro foi concluido, ok!
           // return redirect()->route('aluno.create')->with('msg','Aluno cadastrado com SUCESSO!');  
    
        }catch(\Exception $e){

            // Se deu algum erro, volta tudo.
            DB::rollback();
            throw new \Exception($e->getMessage());
            //return redirect()->route('aluno.store')->with('red-msg','Ops! Algo de errado aconteceu!');
          
        }

    }


    public function findFornecedor($id)
    {
        return $this->model->find($id);
    }


    public function updateFornecedor($request, $id)
    {
        return $this->model->find($request->id)->update($request->all());
    }


    public function destroyFornecedor($id)
    {
        return $this->model->find($id)->delete();
    }
}

