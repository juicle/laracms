<?php

Route::group([
    'as'         => 'user.',
    'namespace'  => 'User',
    'middleware' => 'admin',
], function () {
    Route::group(['prefix' => 'user',], function () {
       Route::get('/','UserController@list');
       Route::get('create','UserController@create');
       Route::post('store','UserController@store')->name('store');
    });
    Route::group(['prefix' => 'usergroup',], function () {
       Route::get('/','UserGroupController@list')->name('rolelist');
       Route::get('create','UserGroupController@create');
       Route::post('store','UserGroupController@store')->name('addrole');
    });
    
});


