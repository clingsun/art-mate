<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});




//--------- append route 2022-07-16 03:08:37----------

Route::any('/labelss/list', 'LabelsControllers@getList');
Route::any('/labelss/detail', 'LabelsControllers@getDetail');
Route::any('/labelss/save', 'LabelsControllers@save');
Route::any('/labelss/delete', 'LabelsControllers@delete');
Route::any('/labelss/batch_delete', 'LabelsControllers@batchDelete');




//--------- append route 2022-07-16 03:10:05----------

Route::any('/orderss/list', 'OrdersControllers@getList');
Route::any('/orderss/detail', 'OrdersControllers@getDetail');
Route::any('/orderss/save', 'OrdersControllers@save');
Route::any('/orderss/delete', 'OrdersControllers@delete');
Route::any('/orderss/batch_delete', 'OrdersControllers@batchDelete');




//--------- append route 2022-07-16 03:10:27----------

Route::any('/treasures/list', 'TreasureControllers@getList');
Route::any('/treasures/detail', 'TreasureControllers@getDetail');
Route::any('/treasures/save', 'TreasureControllers@save');
Route::any('/treasures/delete', 'TreasureControllers@delete');
Route::any('/treasures/batch_delete', 'TreasureControllers@batchDelete');




//--------- append route 2022-07-16 03:13:23----------

Route::any('/users/list', 'UserControllers@getList');
Route::any('/users/detail', 'UserControllers@getDetail');
Route::any('/users/save', 'UserControllers@save');
Route::any('/users/delete', 'UserControllers@delete');
Route::any('/users/batch_delete', 'UserControllers@batchDelete');
