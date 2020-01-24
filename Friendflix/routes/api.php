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
Route::get('listaUser', 'UserController@ListUser');
Route::get('mostraUser/{id}', 'UserController@showUser');
Route::post('criaUser', 'UserController@createUser');
Route::put('atualizaUser/{id}', 'UserController@updateUser');
Route::delete('deletaUser/{id}', 'UserController@deleteUser');

