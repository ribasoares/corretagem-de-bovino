<?php 

namespace App\Contracts;

interface FormaPagRepoInterface 
{
   
    public function allFormaPag();
    public function createFormaPag($request);
    public function findFormaPag($id); 
    public function destroyFormaPag($id);
}