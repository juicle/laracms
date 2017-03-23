<?php

Route::group([
    'prefix'     => 'setting',
    'as'         => 'setting.',
    'namespace'  => 'Setting',
], function () {
    Route::get('/','SettingController@view');
    Route::post('/','SettingController@store');
});


