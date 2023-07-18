<?php 

namespace App\Contracts;

interface CompraRepoInterface 
{
   
    public function allCompra();
    public function allEstoque();
    public function createCompra($request);
    public function findCompra($id);
    public function findEstoque($id);
    public function updateCompra($request, $id);
    public function destroyCompra($id);
}