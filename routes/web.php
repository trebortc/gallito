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
    return view('diseno.master'); 
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
Route::get('/criadero', 'CriaderoController@index')->name('criadero');
Route::get('/criadero/nuevo', 'CriaderoController@nuevo')->name('criadero_nuevo');
Route::post('/criadero/crear', 'CriaderoController@crear')->name('criadero_crear');
Route::get('/criadero/ver/{id}', 'CriaderoController@ver')->name('criadero_ver')
    ->where('id', '[0-9]+');
Route::get('/criadero/ver/{id}', 'CriaderoController@actualizar')
    ->where('id', '[0-9]+');
Route::get('/criadero/ver/{id}', 'CriaderoController@eliminar')
    ->where('id', '[0-9]+');
Route::get('/criadero/ver/{id}', 'CriaderoController@estado')
    ->where('id', '[0-9]+');

//TORNEO
Route::get('/torneo', 'TorneoController@index')->name('torneo');
Route::get('/torneo/nuevo', 'TorneoController@nuevo')->name('torneo_nuevo');
Route::post('/torneo/crear', 'TorneoController@crear')->name('torneo_crear');
Route::get('/torneo/ver/{id}', 'TorneoController@ver')->name('torneo_ver')
    ->where('id', '[0-9]+');

//REPRESENTANTE
Route::get('/representante', 'RepresentanteController@index')->name('representante');
Route::get('/representante/nuevo', 'RepresentanteController@nuevo')->name('representante_nuevo');
Route::post('/representante/crear', 'RepresentanteController@crear')->name('representante_crear');
Route::get('/representante/ver/{id}', 'RepresentanteController@ver')->name('representante_ver')
    ->where('id', '[0-9]+');

//GALLO
Route::get('/gallo', 'GalloController@index')->name('gallo');;
Route::get('/gallo/nuevo', 'GalloController@nuevo')->name('gallo_nuevo');
Route::post('/gallo/crear', 'GalloController@crear')->name('gallo_crear');
Route::get('/gallo/ver/{id}', 'GalloController@ver')->name('gallo_ver')
    ->where('id', '[0-9]+');

//INSCRIPCION TORNEO
Route::get('/inscripcion_torneo', 'InscripcionTorneoController@index')->name('inscripcion_torneo');
Route::get('/inscripcion_torneo/nuevo', 'InscripcionTorneoController@nuevo')->name('inscripcion_torneo_nuevo');
Route::post('/inscripcion_torneo/crear', 'InscripcionTorneoController@crear')->name('inscripcion_torneo_crear');
Route::get('/inscripcion_torneo/ver/{id}', 'InscripcionTorneoController@ver')->name('inscripcion_torneo_ver')
    ->where('id', '[0-9]+');

//Route::get('/inscripcion_torneo/obtener_gallo/{id}', 'InscripcionTorneoController@gallo')->name('inscripcion_torneo_info');
Route::get('/inscripcion_torneo/obtener_gallo/{gallo_id}', function ($gallo_id) {
    echo $gallo_id;
    echo $gallo_id;
    $gallo = App\Gallo::where('ID_GALLO','=',$gallo_id)->get();
    return Response::json($gallo);
});