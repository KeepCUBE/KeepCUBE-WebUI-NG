<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
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

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');*/

Route::post('/auth', 'AuthController@authenticate');
Route::post('/register', 'RegisterController@register');

Route::group([
  'middleware' => 'jwt',
  'namespace' => 'V1',
  'prefix' => 'v1'
], function() {
  Route::resource('/users', 'UserController', ['except' => ['create', 'edit']]);

});

/*Route::get('/action', function () {
    Redis::publish('keepi:action', json_encode(['#ahojdaw' => '#ajdiwd']));
  });*/
