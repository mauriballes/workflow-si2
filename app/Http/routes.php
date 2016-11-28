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

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Rutas Departamentos
Route::group(['prefix' => 'departamentos'],function(){
    Route::get('/','DepartamentosController@index');
    Route::get('/crear','DepartamentosController@create');
    Route::post('/','DepartamentosController@store');
    Route::get('/{departamento}','DepartamentosController@show');
    Route::get('/{departamento}/editar','DepartamentosController@edit');
    Route::put('/{departamento}','DepartamentosController@update');
    Route::delete('/{departamento}','DepartamentosController@destroy');
});

// Rutas Actividades
Route::group(['prefix' => 'actividades'],function(){
    Route::get('/','ActividadesController@index');
    Route::get('/crear','ActividadesController@create');
    Route::post('/','ActividadesController@store');
    Route::get('/{actividad}','ActividadesController@show');
    Route::get('/{actividad}/editar','ActividadesController@edit');
    Route::put('/{actividad}','ActividadesController@update');
    Route::delete('/{actividad}','ActividadesController@destroy');
});

// Rutas Politicas_Negocio
Route::group(['prefix' => 'politicas-negocios'],function(){
    Route::get('/','Politicas_NegociosController@index');
    Route::get('/crear','Politicas_NegociosController@create');
    Route::post('/','Politicas_NegociosController@store');
    Route::get('/{politica-negocio}','Politicas_NegociosController@show');
    Route::get('/{politica-negocio}/editar','Politicas_NegociosController@edit');
    Route::put('/{politica-negocio}','Politicas_NegociosController@update');
    Route::delete('/{politica-negocio}','Politicas_NegociosController@destroy');
});

// Rutas Tramites
Route::group(['prefix' => 'tramites'],function(){
    Route::get('/','TramitesController@index');
    Route::get('/crear','TramitesController@create');
    Route::post('/','TramitesController@store');
    Route::get('/{tramite}','TramitesController@show');
    Route::get('/{tramite}/editar','TramitesController@edit');
    Route::put('/{tramite}','TramitesController@update');
    Route::delete('/{tramite}','TramitesController@destroy');
});

// Rutas Trabajador
Route::group(['prefix' => 'trabajadores'],function(){
    Route::get('/','TrabajadoresController@index');
    Route::put('/{historial}','TrabajadoresController@historiales');
    Route::get('/actividades','TrabajadoresController@verHistoriales');
    Route::put('/actividades/{historial}','TrabajadoresController@finHistorial');

    Route::get('/crear','TramitesController@create');
    Route::post('/','TramitesController@store');
    Route::get('/{tramite}','TramitesController@show');
    Route::get('/{tramite}/editar','TramitesController@edit');
    Route::put('/{tramite}','TramitesController@update');
    Route::delete('/{tramite}','TramitesController@destroy');
});
