<?php

namespace App\Repositories\Backend\User;

use App\Models\User\User;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;


class UserRepository extends Repository
{
    const MODEL = User::class;
    public $pageSize = 15;

    public function getUsers(){
        return $this->getAll($this->pageSize);
    }

    public function active(Model $user){

    }

    public function update(Model $user, array $input){

    }

    public function delete(Model $user){

    }

    public function userInfo(Model $user){

    }
   
}
