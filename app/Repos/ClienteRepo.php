<?php

namespace App\Repos;

use App\Models\Cliente;
use App\Models\DadoCliente;
use App\Contracts\ClienteRepoInterface;
use DB;

class ClienteRepo implements ClienteRepoInterface 
{
    protected $model;
    protected $dadoCliente;


    public function __construct(Cliente $model, DadoCliente $dadoCliente)
    {
        $this->model = $model;
        $this->dadoCliente = $dadoCliente;
    }


    public function allCliente()
    {
        return $this->model->all();
    }


    public function createCliente($request)
    {
        try{
            DB::beginTransaction();

            $cliente = $this->model->create($request->only($this->model->getFillable()));

            $dadoCliente = $request->only($this->dadoCliente->getFillable());
            $dadoCliente['cliente_id'] = $cliente->id;
            $this->dadoCliente->create($dadoCliente);

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


    public function findCliente($id)
    {
        return $this->model->find($id);
    }


    public function updateCliente($request, $id)
    {
        return $this->model->find($request->id)->update($request->all());
    }


    public function destroyCliente($id)
    {
        return $this->model->find($id)->delete();
    }
}

