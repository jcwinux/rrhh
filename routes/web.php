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
{	/*Sin permiso para acceder a una ruta específica*/
	Route::get('/sinacceso',function () {
		return view('nopermiso');
	});

	Route::get('/modulos', function () {
		$modulos = DB::table('modules_roles')->join('modules','modules_roles.module_id','modules.id')
											 ->where('modules_roles.role_id',Auth::user()->role_id)
											 ->where('modules_roles.estado','ACTIVO')
											 ->select('modules.id as id','modules.nombre as nombre','modules.descripcion as descripcion','modules.ruta as ruta')
											 ->get();
		return view('modulos',compact('modulos'));
	});
	Route::get('/configuracion', 'SetupController@index');
	Route::get('/catalogo', 'CatalogController@index')->middleware('route_permission:4');
	Route::get('/roles', 'RoleController@index')->middleware('route_permission:2');
	Route::get('/permisos', 'PermissionsController@index')->middleware('route_permission:3');
	
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
	
	Route::get('/ajax-modulos_asignados/{role_id}','PermissionsController@modulos_asignados');
	Route::get('/ajax-form_functions/{id}','PermissionsController@modules_roles_forms_functions_show');
	
	Route::get('/ajax-towns/{city_id}',function ($city_id) {
		$towns = App\Town::where('city_id','=',$city_id)->get();
		return Response::json($towns);
	});
	
	Route::get('/ajax-catalogo_por_tipo/{cat_tipo_id}',function ($cat_tipo_id) {
		$catalogo = App\Catalog::where('catalog_type_id','=',$cat_tipo_id)->get();
		$html = view('pages.configuracion.tabla_catalogo', compact('view','catalogo'))->render();
        return Response::json(compact('html'));
	});
	
	Route::get('/ajax-forms_por_modulo/{module_role_id}',function ($module_role_id) {
		$forms = DB::table('modules_roles_forms')->join('forms','modules_roles_forms.form_id','=','forms.id')
												 ->where('modules_roles_forms.module_role_id',$module_role_id)
												 ->where('forms.estado','ACTIVO')
												 ->select('forms.nombre','forms.descripcion','modules_roles_forms.id','modules_roles_forms.estado')
												 ->get();
		$html = view('pages.configuracion.tabla_permisos', compact('view','forms'))->render();
        return Response::json(compact('html'));
	});
	
	Route::get('/ajax-roles',function () {
		$roles = App\Role::all();
		$html = view('pages.configuracion.tabla_rol', compact('view','roles'))->render();
        return Response::json(compact('html'));
	});
	Route::post('/crearPersona', 'PeopleController@crearPersona');
	Route::patch('/persona_edit/{person_id}/edit', 'PeopleController@editarPersona');
	Route::post('/guardarItemCatalogo', 'CatalogController@store');
	Route::post('/cambiarEstado/', 'CatalogController@change_state');
	/*Formulario para consultar datos de un ítem del catálogo*/
	Route::get('/ajax-catalog_show/{catalog_id}', 'CatalogController@show');
	Route::post('/guardarRol', 'RoleController@store');
	Route::post('/cambiarEstadoRol/', 'RoleController@change_state');
	Route::get('/ajax-rol_show/{rol_id}', 'RoleController@show');
	/*Permisos*/
	Route::get('/ajax-cambiarEstadoPermiso/{id}/{estado}/{formulario}', 'PermissionsController@modules_roles_forms_functions_change_state');
	/*Usuarios*/
	Route::get('/usuarios', 'UserController@index')->middleware('route_permission:1');
	Route::post('/guardarUsuario', 'UserController@store');
	Route::get('/ajax-usuarios', 'UserController@view');
	Route::post('/cambiarEstadoUsuario/', 'UserController@change_state');
	Route::get('/ajax-usuario_show/{user_id}', 'UserController@show');
	Route::get('/ajax-validate_username/{username}', 'UserController@validate_username');
	Route::get('/cambiarClave', function (){
		return view('pages.configuracion.form_cambiar_clave');
	});
	Route::post('/cambiarClave/cambiar', 'UserController@change_pass');
	/*Validaciones*/
	Route::get('/ajax-validate_email/{username}', 'GeneralController@validate_email');
	
}
);
Auth::routes();

Route::get('/home', 'HomeController@index');
