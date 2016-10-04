<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Inicio de sesión*/
Route::post('/authenticate', 'AuthController@authenticate');

/*Cerrar sesión*/
Route::get('/logout','AuthController@logout');

/*Cerrar sesión cuando se termina el tiempo de sesión*/
Route::get('/quit_app','AuthController@quit_app');

/*Envía directamente al index si existe una sesión iniciada que aún no haya expirado*/
Route::get('/',function () {
	return view('login');
})->middleware('sessionTimeOut','index');

/*Seguridad: Toda ruta debe tener una sesión activa*/
Route::group(['middleware'=>['auth','sessionTimeOut']], function()
{	Route::get('/modulos', function () {
		return view('modulos');
	});
	Route::get('/configuracion', function () {
		return view('pages.configuracion.index');
	});
	Route::get('/personal', function () {
		return view('pages.personal.index');
	});
	Route::get('/horarios', function () {
		return view('pages.horarios.index');
	});
	Route::get('/nomina', function () {
		return view('pages.nomina.index');
	});
	Route::get('/evaluacion', function () {
		return view('pages.evaluacion.index');
	});
	Route::get('/reclutamiento', function () {
		return view('pages.reclutamiento.index');
	});
}
);