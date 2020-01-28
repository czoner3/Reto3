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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'UserController@index')->name('home');

Route::get('/create/incidencia', 'IncidenciaController@create');

Route::get('/incidencia','IncidenciaController@index');

Route::get('/tecnico','TecnicoController@index');

Route::get('/create/incidencia', 'IncidenciaController@create')->name('crearIncidencia');

Route::post('/incidencia','IncidenciaController@store');


Route::post('/registerUsuario', 'RegistroUsuarioController@store')->name('registerUsuario');


Route::get('/send-mail','UserController@sendEmail') ->name('sendMail');

Route::post('/tecnico/{id}','TecnicoController@update');

Route::get('/estadisticas','EstadisticasController@index')->name("estadisticas");

Route::get('/estadisticas/cargar' , 'EstadisticasController@comprobarChart');




