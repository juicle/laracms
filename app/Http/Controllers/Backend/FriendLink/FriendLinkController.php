<?php

namespace App\Http\Controllers\Backend\FriendLink;

use App\Http\Controllers\Controller;

class FriendLinkController extends Controller{

    public function list(){
        return view('backend.friendlinklist');
    }
    
    public function create(){
        return view('backend.addfriendlink');
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