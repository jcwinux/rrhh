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
	/*Formulario para agregar nueva persona*/
	Route::get('/persona', function () {
		$tipo_doc	= App\DocumentType::all();
		$provinc	= App\Province::all();
		return view('pages.reclutamiento.form_persona_crear',compact('tipo_doc','provinc'));
	});
	
	Route::get('/ajax-cities/{province_id}',function ($province_id) {
		$cities = App\City::where('province_id','=',$province_id)->get();
		return Response::json($cities);
	});
	
	Route::get('/ajax-towns/{city_id}',function ($city_id) {
		$towns = App\Town::where('city_id','=',$city_id)->get();
		return Response::json($towns);
	});
	
	Route::post('/crearPersona', 'PeopleController@crearPersona');
}
);