<?php

namespace App\Http\Controllers\Backend\Article;

use App\Http\Controllers\Controller;

class ArticleController extends Controller{

    public function list(){
        return view('backend.articlelist');
    }
    
    public function create(){
        return view('backend.addarticle');
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