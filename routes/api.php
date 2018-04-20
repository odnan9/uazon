<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * autores table api routes
 */
Route::get('autores', '\App\Database\Controllers\autoresController@index');
Route::get('autores/{id}', '\App\Database\Controllers\autoresController@show');
Route::post('autores', '\App\Database\Controllers\autoresController@store');
Route::put('autores/{id}', '\App\Database\Controllers\autoresController@update');
Route::delete('autores/{id}', '\App\Database\Controllers\autoresController@delete');

/*
 * ciudades table api routes
 */
Route::get('ciudades', '\App\Database\Controllers\ciudadesController@index');
Route::get('ciudades/{id}', '\App\Database\Controllers\ciudadesController@show');
Route::post('ciudades', '\App\Database\Controllers\ciudadesController@store');
Route::put('ciudades/{id}', '\App\Database\Controllers\ciudadesController@update');
Route::delete('ciudades/{id}', '\App\Database\Controllers\ciudadesController@delete');

/*
 * comentarios table api routes
 */
Route::get('comentarios', '\App\Database\Controllers\comentariosController@index');
Route::get('comentarios/{id}', '\App\Database\Controllers\comentariosController@show');
Route::post('comentarios', '\App\Database\Controllers\comentariosController@store');
Route::put('comentarios/{id}', '\App\Database\Controllers\comentariosController@update');
Route::delete('comentarios/{id}', '\App\Database\Controllers\comentariosController@delete');

/*
 * fotos table api routes
 */
Route::get('fotos', '\App\Database\Controllers\fotosController@index');
Route::get('fotos/{id}', '\App\Database\Controllers\fotosController@show');
Route::post('fotos', '\App\Database\Controllers\fotosController@store');
Route::put('fotos/{id}', '\App\Database\Controllers\fotosController@update');
Route::delete('fotos/{id}', '\App\Database\Controllers\fotosController@delete');

/*
 * libros_autores table api routes
 */
Route::get('libros_autores', '\App\Database\Controllers\libros_autoresController@index');
Route::get('libros_autores/{id}', '\App\Database\Controllers\libros_autoresController@show');
Route::post('libros_autores', '\App\Database\Controllers\libros_autoresController@store');
Route::put('libros_autores/{id}', '\App\Database\Controllers\libros_autoresController@update');
Route::delete('libros_autores/{id}', '\App\Database\Controllers\libros_autoresController@delete');

/*
 * libros table api routes
 */
Route::get('libros', '\App\Database\Controllers\librosController@index');
Route::get('libros/{id}', '\App\Database\Controllers\librosController@show');
Route::post('libros', '\App\Database\Controllers\librosController@store');
Route::put('libros/{id}', '\App\Database\Controllers\librosController@update');
Route::delete('libros/{id}', '\App\Database\Controllers\librosController@delete');

/*
 * paises table api routes
 */
Route::get('paises', '\App\Database\Controllers\paisesController@index');
Route::get('paises/{id}', '\App\Database\Controllers\paisesController@show');
Route::post('paises', '\App\Database\Controllers\paisesController@store');
Route::put('paises/{id}', '\App\Database\Controllers\paisesController@update');
Route::delete('paises/{id}', '\App\Database\Controllers\paisesController@delete');

/*
 * pedidos_libros table api routes
 */
Route::get('pedidos_libros', '\App\Database\Controllers\pedidos_librosController@index');
Route::get('pedidos_libros/{id}', '\App\Database\Controllers\pedidos_librosController@show');
Route::post('pedidos_libros', '\App\Database\Controllers\pedidos_librosController@store');
Route::put('pedidos_libros/{id}', '\App\Database\Controllers\pedidos_librosController@update');
Route::delete('pedidos_libros/{id}', '\App\Database\Controllers\pedidos_librosController@delete');

/*
 * pedidos table api routes
 */
Route::get('pedidos', '\App\Database\Controllers\pedidosController@index');
Route::get('pedidos/{id}', '\App\Database\Controllers\pedidosController@show');
Route::post('pedidos', '\App\Database\Controllers\pedidosController@store');
Route::put('pedidos/{id}', '\App\Database\Controllers\pedidosController@update');
Route::delete('pedidos/{id}', '\App\Database\Controllers\pedidosController@delete');
