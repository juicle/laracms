<?php

namespace App\Http\Controllers\Backend\Notice;

use App\Http\Controllers\Controller;

class NoticeController extends Controller{

    public function list(){
        return view('backend.noticelist');
    }
    
    public function create(){
        return view('backend.addnotice');
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