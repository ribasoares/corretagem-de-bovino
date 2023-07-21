<?php 

namespace App\Contracts;

interface ClienteRepoInterface 
{
    public function allClienteHome();
    public function allCliente();
    public function createCliente($request);
    public function findCliente($id);
    public function updateCliente($request, $id);
    public function destroyCliente($id);
}