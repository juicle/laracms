<?php

namespace App\Http\Controllers\Backend\User;

use App\Models\User\User;
use App\Http\Controllers\Controller;

use App\Repositories\Backend\User\UserRepository;



class UserController extends Controller{

    protected $users;

    
    public function __construct(UserRepository $users){
        $this->users = $users;
 
    }

    public function create(){
        return view('backend.adduser');
    }

    public function list(){
        return view('backend.user')
          ->withUsers($this->users->getUsers());
    }
    
   

    public function store(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }

}