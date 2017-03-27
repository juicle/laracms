<?php

Route::group([
    'prefix'     => 'setting',
    'as'         => 'setting.',
    'namespace'  => 'Setting',
    'middleware' => 'admin',
], function () {
    Route::get('/','SettingController@view');
    Route::post('/','SettingController@store');
});


