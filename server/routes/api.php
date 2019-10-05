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

Route::get('record/{module}/{id}', 'Api\RecordController@show');
Route::put('record/{module}/{id}', 'Api\RecordController@update');
Route::get('record/{module}', 'Api\RecordController@index');
Route::post('record/{module}', 'Api\RecordController@store');
Route::delete('record/{module}', 'Api\RecordController@destroy');

Route::apiResource('module', 'Api\ModuleController');
