<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
//     includeRouteFiles(__DIR__.'/Frontend/');
// });


// Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
//     includeRouteFiles(__DIR__.'/Backend/');
// });

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    includeRouteFiles(__DIR__.'/Backend/');
});

