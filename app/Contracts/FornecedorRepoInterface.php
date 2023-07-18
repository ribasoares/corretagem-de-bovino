<?php 

namespace App\Contracts;

interface FornecedorRepoInterface 
{
   
    public function allFornecedor();
    public function createFornecedor($request);
    public function findFornecedor($id);
    public function updateFornecedor($request, $id);
    public function destroyFornecedor($id);
}