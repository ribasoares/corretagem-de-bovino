<?php 

namespace App\Contracts;

interface VendaRepoInterface 
{
   
    public function allVenda();
    public function allVendaHome();
    public function createVenda($request);
    public function findVenda($id);
    public function updateVenda($request, $id);
    public function destroyVenda($id);
}