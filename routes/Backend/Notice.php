<?php

Route::group([
    'prefix'     => 'notice',
    'as'         => 'notice.',
    'namespace'  => 'Notice',
    'middleware' => 'admin',
], function () {
    Route::get('/', 'NoticeController@list');
    Route::get('create', 'NoticeController@create');
});


