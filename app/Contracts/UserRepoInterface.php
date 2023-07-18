<?php 

namespace App\Contracts;

interface UserRepoInterface 
{
   
    public function allUser();
    public function createUser($request);
    public function findUser($id);
    public function updateUser($request, $id);
    public function destroyUser($id);
}