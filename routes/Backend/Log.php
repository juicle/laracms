<?php

Route::group([
    'prefix'     => 'log',
    'as'         => 'log.',
    'namespace'  => 'Log',
    'middleware' => 'admin',
], function () {

    Route::get('/','LogController@list');

});