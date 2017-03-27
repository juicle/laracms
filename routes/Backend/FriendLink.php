<?php

Route::group([
    'prefix'     => 'friendlink',
    'as'         => 'friendlink.',
    'namespace'  => 'FriendLink',
    'middleware' => 'admin',
], function () {

    Route::get('/', 'FriendLinkController@list');
    Route::get('create', 'FriendLinkController@create');

});