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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('login');
});
Route::get('/modulos', function () {
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