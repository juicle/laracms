<?php

Route::group([
    'prefix'     => 'friendlink',
    'as'         => 'friendlink.',
    'namespace'  => 'FriendLink',
], function () {

    Route::get('/', 'FriendLinkController@list');
    Route::get('create', 'FriendLinkController@create');

});