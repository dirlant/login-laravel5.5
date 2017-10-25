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

Route::resource('intentos', 'AttemptController', [
      'except' => [
        'edit', 'update', 'destroy'
      ]
    ]
  );

Route::resource('user', 'UserController', [
      'except' => [
        'edit', 'update', 'destroy'
      ]
    ]
  );

Route::resource('words', 'WordController', [
      'except' => [
        'edit', 'update', 'destroy', 'show'
      ]
    ]
  );
Route::post('user-login', 'UserController@login');
