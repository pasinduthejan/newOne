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

Route::get('/gettodos','TodoController@getTodos');
//Route::post('/deleteTodo','TodoController@deleteTodo');

Route::post('/insertTodo','TodoController@insertTodo');

Route::put('/updateTodo/{id}','TodoController@updateData');

Route::delete('/deleteTodo/{id}','TodoController@deleteData');