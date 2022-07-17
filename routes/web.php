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




//--------- append route 2022-07-16 03:08:37----------

Route::get('/layout', 'RenderController@index');
Route::get('/layout/render', 'RenderController@render');




//--------- append route 2022-07-16 03:10:05----------

Route::get('/layout', 'RenderController@index');
Route::get('/layout/render', 'RenderController@render');




//--------- append route 2022-07-16 03:10:27----------

Route::get('/layout', 'RenderController@index');
Route::get('/layout/render', 'RenderController@render');




//--------- append route 2022-07-16 03:13:23----------

Route::get('/layout', 'RenderController@index');
Route::get('/layout/render', 'RenderController@render');
