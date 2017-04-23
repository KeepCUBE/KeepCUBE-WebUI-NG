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
Route::post('/commands/murder', 'CommandController@murder')->name('commands.murder');
Route::post('/commands/slain', 'CommandController@slain')->name('commands.slain');
Route::post('/commands/execute/{id}', 'CommandController@execute')->name('commands.execute');
Route::resource('/commands', 'CommandController');
Route::resource('/users', 'UserController', ['except' => ['create', 'edit']]);
Route::resource('/devices', 'DeviceController', ['except' => ['create', 'edit']]);
Route::resource('/rooms', 'RoomController', ['except' => ['create', 'edit']]);

