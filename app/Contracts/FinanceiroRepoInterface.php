<?php 

namespace App\Contracts;

interface FinanceiroRepoInterface 
{
   
    public function allPagarConta();
    public function findPagarConta($id);
    public function updatePagarConta($request, $id);

    public function allReceberConta();   
    public function findReceberConta($id);    
    public function updateReceberConta($request, $id);


    public function allLucro();
    public function UpdateLucro($request, $id);

   // public function destroyCompra($id);
}