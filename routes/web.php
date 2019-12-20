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
DB::listen(function($query){

	echo "<pre>{$query->sql}</pre>";
});
*/
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login', ['as' => 'login', function(){
    return view('auth.login');
}]);
Route::get('/menu', ['as' => 'menu', 'uses' => 'menu@index']);
Route::get('/inicio', ['as' => 'bienvenida', 'uses' => 'menu@bienvenida']);
Route::resource('usuarios', 'UsersController');
Route::resource('colaborador', 'AlumnosController');
Route::resource('jefe', 'JefeController');
Route::resource('asistencias', 'AsistenciaController');
Route::get('/faltas', ['as' => 'faltas', 'uses' => 'IncidenciaController@faltas']);
Route::resource('incidencias', 'IncidenciaController');




Auth::routes();

Route::get('/home', ['as' => 'bienvenida', 'uses' => 'menu@bienvenida']);

Route::get('/checar', ['as' => 'checar', 'uses' => 'AsistenciaController@checador']);
Route::get('/tarjeta/{id}', ['as' => 'tarjeta/', 'uses' => 'AlumnosController@tarjeta']);

Route::get('/pdftarjeta/{id}', ['as' => 'pdftarjeta/', 'uses' => 'AlumnosController@pdftarjeta']);



