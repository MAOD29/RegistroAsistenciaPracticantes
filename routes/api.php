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

Route::resource('pokemons', 'HomeController');
                                                                                                               

Route::get('curso', 'HomeController@curso');
Route::get('unidad', 'HomeController@unidad');
Route::get('tema', 'HomeController@tema');
Route::get('texto', 'HomeController@texto');
Route::get('preguntas', 'HomeController@pregunta');

Route::get('alumnos', 'HomeController@alumnos');
