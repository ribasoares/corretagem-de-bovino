<?php

namespace App\Repos;

use App\Models\User;
use App\Contracts\UserRepoInterface;
use DB;

class UserRepo implements UserRepoInterface 
{
    protected $model;


    public function __construct(User $model)
    {
        $this->model = $model;
       
    }


    public function allUser()
    {
        return $this->model->all();
    }


    public function createUser($request)
    {
        $request->validate([

            'user_nome' => ['required'],
            'user_email' => ['required'],
            'user_senha' => ['required', 'min:8'],

            
        
         ]);

        $user = $request->only($this->model->getFillable());
        $user['user_senha'] = bcrypt($request->user_senha);
        $this->model->create($user);

       // dd($user);


    }  

    public function findUser($id)
    {
        return $this->model->find($id);
    }


    public function updateUser($request, $id)
    {
        return $this->model->find($request->id)->update($request->all());
    }


    public function destroyUser($id)
    {
        return $this->model->find($id)->delete();
    }
}

