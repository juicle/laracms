<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::group(['middleware' => 'admin'], function () {
  Route::get('main', 'MainController@index')->name('main');
});

Route::get('login', 'MainController@showLoginForm')->name('login');
Route::post('login', 'MainController@login')->name('login');
Route::get('logout', 'MainController@logout')->name('logout');