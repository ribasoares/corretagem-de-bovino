<?php 

namespace App\Contracts;

interface VendedorRepoInterface 
{
   
    public function allVendedor();
    public function createVendedor($request);
    public function findVendedor($id); 
    public function destroyVendedor($id);
}