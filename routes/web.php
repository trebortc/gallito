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

Route::get('/', function () {
    return view('master'); 
});

//Ruta para interactuar con el AJAX - EJEMPLO
Route::post('miJqueryAjax', 'AjaxController@index');

Route::get('ajax',function(){
    return view('mensaje');
 });
 
Route::post('/getmsg','AjaxController2@index');


Route::get('/indexCriadero', 'AjaxController@index');
Route::post('/listadoCriaderos', 'AjaxController@loadCriaderos');


//CRIADERO
Route::get('/criadero', 'CriaderoController@index');
Route::get('/criadero/nuevo', 'CriaderoController@nuevo');
Route::post('/criadero/crear', 'CriaderoController@crear');
Route::get('/criadero/ver/{id}', 'CriaderoController@ver')
    ->where('id', '[0-9]+');

//TORNEO
Route::get('/torneo', 'TorneoController@index');
Route::get('/torneo/nuevo', 'TorneoController@nuevo');
Route::post('/torneo/crear', 'TorneoController@crear');
Route::get('/torneo/ver/{id}', 'TorneoController@ver')
    ->where('id', '[0-9]+');

//REPRESENTANTE
Route::get('/representante', 'RepresentanteController@index');
Route::get('/representante/nuevo', 'RepresentanteController@nuevo');
Route::post('/representante/crear', 'RepresentanteController@crear');
Route::get('/representante/ver/{id}', 'RepresentanteController@ver')
    ->where('id', '[0-9]+');

//GALLO
Route::get('/gallo', 'GalloController@index');
Route::get('/gallo/nuevo', 'GalloController@nuevo');
Route::post('/gallo/crear', 'GalloController@crear');
Route::get('/gallo/ver/{id}', 'GalloController@ver')
    ->where('id', '[0-9]+');

//INSCRIPCION TORNEO
Route::get('/inscripcion_torneo', 'InscripcionTorneoController@index');
Route::get('/inscripcion_torneo/nuevo', 'InscripcionTorneoController@nuevo');
Route::post('/inscripcion_torneo/crear', 'InscripcionTorneoController@crear');
Route::get('/inscripcion_torneo/ver/{id}', 'InscripcionTorneoController@ver')
    ->where('id', '[0-9]+');
