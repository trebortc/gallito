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
Route::post('/mensajeJson/{id}','AjaxController@mensajejson');


//RUTAS CRIADERO
Route::get('/criadero', 'CriaderoController@index')->name('criadero');
Route::get('/criadero/nuevo', 'CriaderoController@nuevo')->name('criadero_nuevo');
Route::post('/criadero/crear', 'CriaderoController@crear')->name('criadero_crear');
Route::get('/criadero/ver/{id}', 'CriaderoController@ver')->name('criadero_ver')
    ->where('id', '[0-9]+');
Route::get('/criadero/eliminar/{id}', 'CriaderoController@eliminar')->name('criadero_eliminar')
    ->where('id', '[0-9]+');
Route::get('/criadero/editar/{id}', 'CriaderoController@editar')->name('criadero_editar')
    ->where('id', '[0-9]+');
Route::post('/criadero/actualizar', 'CriaderoController@actualizar')->name('criadero_actualizar');

//RUTAS TORNEO
Route::get('/torneo', 'TorneoController@index')->name('torneo');
Route::get('/torneo/nuevo', 'TorneoController@nuevo')->name('torneo_nuevo');
Route::post('/torneo/crear', 'TorneoController@crear')->name('torneo_crear');
Route::get('/torneo/ver/{id}', 'TorneoController@ver')->name('torneo_ver')
    ->where('id', '[0-9]+');
Route::get('/torneo/eliminar/{id}','TorneoController@eliminar')->name('torneo_eliminar')
    ->where('id', '[0-9]+');
Route::get('/torneo/editar/{id}','TorneoController@editar')->name('torneo_editar')
    ->where('id', '[0-9]+');
Route::post('/torneo/actualizar', 'TorneoController@actualizar')->name('torneo_actualizar');

//RUTAS REPRESENTANTE
Route::get('/representante', 'RepresentanteController@index')->name('representante');
Route::get('/representante/nuevo', 'RepresentanteController@nuevo')->name('representante_nuevo');
Route::post('/representante/crear', 'RepresentanteController@crear')->name('representante_crear');
Route::get('/representante/ver/{id}', 'RepresentanteController@ver')->name('representante_ver')
    ->where('id', '[0-9]+');
Route::get('/representante/eliminar/{id}', 'RepresentanteController@eliminar')->name('representante_eliminar')
    ->where('id', '[0-9]+');
Route::get('/representante/editar/{id}', 'RepresentanteController@editar')->name('representante_editar')
    ->where('id', '[0-9]+');
Route::post('/representante/actualizar', 'RepresentanteController@actualizar')->name('representante_actualizar');

//RUTAS GALLO
Route::get('/gallo', 'GalloController@index')->name('gallo');;
Route::get('/gallo/nuevo', 'GalloController@nuevo')->name('gallo_nuevo');
Route::post('/gallo/crear', 'GalloController@crear')->name('gallo_crear');
Route::get('/gallo/ver/{id}', 'GalloController@ver')->name('gallo_ver')
    ->where('id', '[0-9]+');
Route::get('/gallo/eliminar/{id}', 'GalloController@eliminar')->name('gallo_eliminar')
    ->where('id', '[0-9]+');
Route::get('/gallo/editar/{id}', 'GalloController@editar')->name('gallo_editar')
    ->where('id', '[0-9]+');
Route::post('/gallo/actualizar', 'GalloController@actualizar')->name('gallo_actualizar');

//INSCRIPCION TORNEO
Route::get('/inscripcion_torneo', 'InscripcionTorneoController@index')->name('inscripcion_torneo');
Route::get('/inscripcion_torneo/nuevo', 'InscripcionTorneoController@nuevo')->name('inscripcion_torneo_nuevo');
Route::post('/inscripcion_torneo/crear', 'InscripcionTorneoController@crear')->name('inscripcion_torneo_crear');
Route::get('/inscripcion_torneo/ver/{id}', 'InscripcionTorneoController@ver')->name('inscripcion_torneo_ver')
    ->where('id', '[0-9]+');
Route::post('/inscripcion_torneo/cargarInformacionGallo/{id}','InscripcionTorneoController@cargarInformacionGallo')->name('inscripcion_torneo_cargarInfoGallo')
    ->where('id', '[0-9]+');

//PELEA GALLOS
Route::get('/pelea_gallos', 'PeleaGallosController@index')->name('pelea_gallos');
Route::get('/pelea_gallos/nuevo', 'PeleaGallosController@nuevo')->name('pelea_gallos_nuevo');
Route::post('/pelea_gallos/crear', 'PeleaGallosController@crear')->name('pelea_gallos_crear');
Route::get('/pelea_gallos/ver/{id}', 'PeleaGallosController@ver')->name('pelea_gallos_ver')
    ->where('id', '[0-9]+');
Route::post('/pelea_gallos/cargarInformacionGallo/{id}','InscripcionTorneoController@cargarInformacionGallo')->name('pelea_gallos_cargarInfoGallo')
    ->where('id', '[0-9]+');

Route::get('/pelea_gallos/eliminar/{id}', 'PeleaGallosController@eliminar')->name('pelea_gallos_eliminar')
->where('id', '[0-9]+');
Route::get('/pelea_gallos/editar/{id}', 'PeleaGallosController@editar')->name('pelea_gallos_editar')
->where('id', '[0-9]+');
Route::post('/pelea_gallos/actualizar', 'PeleaGallosController@actualizar')->name('pelea_gallos_actualizar');

//RUTAS PARAMETRO
Route::get('/parametro', 'ParametroController@index')->name('parametro');
Route::get('/parametro/nuevo', 'ParametroController@nuevo')->name('parametro_nuevo');
Route::post('/parametro/crear', 'ParametroController@crear')->name('parametro_crear');
Route::get('/parametro/ver/{id}', 'ParametroController@ver')->name('parametro_ver');
Route::get('/parametro/eliminar/{id}', 'ParametroController@eliminar')->name('parametro_eliminar');
Route::get('/parametro/editar/{id}', 'ParametroController@editar')->name('parametro_editar');
Route::post('/parametro/actualizar', 'ParametroController@actualizar')->name('parametro_actualizar');



//Route::post('/mensajeJson/{id}','AjaxController@mensajejson');

//cargarInformacionGallo

//Route::get('/inscripcion_torneo/obtener_gallo/{id}', 'InscripcionTorneoController@gallo')->name('inscripcion_torneo_info');
Route::get('/inscripcion_torneo/obtener_gallo/{gallo_id}', function ($gallo_id) {
    echo $gallo_id;
    echo $gallo_id;
    $gallo = App\Gallo::where('ID_GALLO','=',$gallo_id)->get();
    return Response::json($gallo);
});