<?php

namespace App\Http\Controllers\Backend\Log;

use App\Http\Controllers\Controller;

class LogController extends Controller{

    public function list(){
        return view('backend.log');
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