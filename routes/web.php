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

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

Auth::routes();

// Public routes
// Root redirects to home (TODO: CHANGE in the future, no need to have / and /home)
Route::get('/', function () {
    return redirect('home');
});
// Home route
Route::get('/home', 'HomeController@index')->name('home');

// Libros routes
Route::get('/libros', 'librosController@index')->name('libros');
Route::get('/libro/{$id}', 'libroController@index');

// Autores routes
Route::get('/autores', 'autoresController@index')->name('autores');
Route::get('/autor/{$id}', 'autorController@index')->name('autor');

// CMS routes
Route::get('/reviews', 'ReviewController@show')->name('reviews_get');
Route::post('/form','ReviewController@store');

// Angula route
Route::get('/{js_route}', function() {
    return view('application');
})->where('js_route', '(.*)'); // Allow multiple URI segments