<?php

namespace App\Repos;

use App\Models\Vendedor;
use App\Contracts\VendedorRepoInterface;
use DB;

class VendedorRepo implements VendedorRepoInterface 
{
    protected $model;
   
    public function __construct(Vendedor $model)
    {
        $this->model = $model;
       
    }


    public function allVendedor()
    {
        return $this->model->all();
    }


    public function createVendedor($request)
    {
      $vendedor = $this->model->create($request->only($this->model->getFillable())); 

      // dd($vendedor);

    }


    public function findVendedor($id)
    {
        return $this->model->find($id);
    }


    public function destroyVendedor($id)
    {
        return $this->model->find($id)->delete();
    }
}

