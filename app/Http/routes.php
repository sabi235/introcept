<?php

/*
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to  |--------------------------------------------------------------------------

  | and give it the controller to call when that URI is requested.
  |
 */

/* Clients*/
Route::get('clients', "ClientController@index");
Route::resource("clients", "ClientController");
Route::get("clients/{id}/delete", "ClientController@destroy");
Route::get("clients/{id}/edit", "ClientController@edit");
Route::post("clients/update", "ClientController@update");

Route::get("all_clients/export", "ClientController@csvExport");

Route::resource("images123", "ImageController");
?>