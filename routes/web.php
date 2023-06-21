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


//Index
Route::get('/', 'IndexController@index')->name('index');
// Rutas para Socios
Route::resource('socios', 'SocioController');
Route::get('socios/{socio}/prestamo', 'SocioController@prestamo')->name('socios.prestamo');
Route::post('socios/{socio}/prestamo', 'SocioController@guardarPrestamo')->name('socios.guardarPrestamo');
// Rutas para Autores
Route::resource('autores', 'AutorController');
// Rutas para Libros
Route::resource('libros', 'LibroController');
//Rutas Inventario
Route::get('inventario', 'InventarioController@index')->name('inventario.index');
Route::get('inventario/{id}/edit', 'InventarioController@edit')->name('inventario.edit');
Route::put('inventario/{id}', 'InventarioController@update')->name('inventario.update');
//Prestamos
Route::get('/prestamos', 'PrestamoController@index')->name('prestamos.index');
Route::delete('/prestamos/{prestamo}', 'PrestamoController@destroy')->name('prestamos.destroy');