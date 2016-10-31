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

/* Clients*/
Route::get('clients', "ClientController@index");
Route::resource("clients", "ClientController");
Route::get("clients/{id}/delete", "ClientController@destroy");
Route::get("clients/{id}/edit", "ClientController@edit");
Route::post("clients/update", "ClientController@update");

Route::get("all_clients/export", "ClientController@csvExport");

Route::get('/', function () {
    return view('welcome');
});
