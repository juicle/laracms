<?php

Route::group([
    'as'         => 'article',
    'namespace'  => 'Article',
    'middleware' => 'admin',
], function () {
    Route::group(['prefix' => 'article'],function(){
       Route::get('/', 'ArticleController@list');
       Route::get('create', 'ArticleController@create');
    });
    Route::group(['prefix' => 'category'],function(){
       Route::get('/', 'CategoryController@view');
    });

});



