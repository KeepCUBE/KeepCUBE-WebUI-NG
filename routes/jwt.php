<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register JWT auth API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*Route::get('/commands/test/{command}', 'CommandController@test');*/
/*Route::resource('/commands', 'CommandController');*/
Route::resource('/users', 'UserController', ['except' => ['create', 'edit']]);
Route::resource('/devices', 'DeviceController', ['except' => ['create', 'edit']]);

