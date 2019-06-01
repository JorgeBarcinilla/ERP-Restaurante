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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ordenes/buscar', 'OrdenController@buscarOrden')->name('ordenes.buscar');
Route::get('/ordenes/cerrar', 'OrdenController@cerrarOrden')->name('ordenes.cerrar');
Route::post('/ordenes/cerrar', 'OrdenController@updateEstado')->name('ordenes.updateEstado');
Route::get('/ventas/buscar', 'VentaController@buscarVenta')->name('ventas.buscar');

Route::resource('ingredientes', 'IngredienteController');
Route::resource('platos', 'PlatoController');
Route::resource('ordenes', 'OrdenController');
Route::resource('ventas', 'VentaController');

