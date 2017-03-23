<?php

Route::group([
    'prefix'     => 'log',
    'as'         => 'log.',
    'namespace'  => 'Log',
], function () {

    Route::get('/','LogController@list');

});