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
		$str_random = array (rand(0,30000),rand(0,30000),rand(0,30000));
		return view('pages.configuracion.index',compact('str_random'));
	});
	Route::get('/catalogo', function () {
		$tipo_cat = App\CatalogType::all();
		$str_random = array (rand(0,30000),rand(0,30000),rand(0,30000));
		return view('pages.configuracion.form_catalogo',compact('str_random','tipo_cat'));
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
	Route::get('/persona', 'PeopleController@persona_new_view');
	
	/*Formulario para editar una persona*/
	Route::get('/persona_edit/{person_id}', 'PeopleController@persona_edit_view');
	
	/*Formulario para buscar personas*/
	Route::get('/persona_search', 'PeopleController@personas_view');
	
	Route::get('/ajax-cities/{province_id}',function ($province_id) {
		$cities = App\City::where('province_id','=',$province_id)->get();
		return Response::json($cities);
	});
	
	Route::get('/ajax-towns/{city_id}',function ($city_id) {
		$towns = App\Town::where('city_id','=',$city_id)->get();
		return Response::json($towns);
	});
	
	Route::get('/ajax-catalogo_por_tipo/{cat_tipo_id}',function ($cat_tipo_id) {
		$catalogo = App\Catalog::where('catalog_type_id','=',$cat_tipo_id)->get();
		$html = view('pages.configuracion.tabla_catalogo', compact('view','catalogo'))->render();
        return Response::json(compact('html'));
	});
	Route::post('/crearPersona', 'PeopleController@crearPersona');
	Route::patch('/persona_edit/{person_id}/edit', 'PeopleController@editarPersona');
	Route::post('/crearItemCatalogo', 'CatalogController@store');
	/*Formulario para consultar datos de un ítem del catálogo*/
	Route::get('/ajax-catalog_show/{catalog_id}', 'CatalogController@show');
}
);