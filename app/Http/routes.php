<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Frontend routes..
Route::get('/', ['as' => 'message','uses' => 'Site\MainController@home']);
Route::post('/store', ['as' => 'store','uses' => 'Site\MainController@store']);

