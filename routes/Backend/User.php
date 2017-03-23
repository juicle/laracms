<?php

Route::group([
    'as'         => 'user',
    'namespace'  => 'User',
], function () {
    Route::group(['prefix' => 'user',], function () {
       Route::get('/','UserController@list');
    });
    Route::group(['prefix' => 'usergroup',], function () {
       Route::get('/','UserGroupController@list');
    });
    
});


