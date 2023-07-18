<?php

namespace App\Repos;

use App\Models\FormaPagamento;
use App\Contracts\FormaPagRepoInterface;
use DB;

class FormaPagRepo implements FormaPagRepoInterface 
{
    protected $model;
   
    public function __construct(FormaPagamento $model)
    {
        $this->model = $model;
       
    }


    public function allFormaPag()
    {
        return $this->model->all();
    }


    public function createFormaPag($request)
    {
        $this->model->create($request->only($this->model->getFillable()));               
    }


    public function findFormaPag($id)
    {
        return $this->model->find($id);
    }


    public function destroyFormaPag($id)
    {
        return $this->model->find($id)->delete();
    }
}

