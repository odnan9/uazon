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
Route::get('login', 'Auth\LoginController@login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

// Registration routes...
Route::get('register', 'Auth\RegisterController@register');
Route::post('register', 'Auth\RegisterControl~ler@register');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Auth::routes();

// Public routes
// Root redirects to home (TODO: CHANGE in the future, no need to have / and /home)
Route::get('/', function () {
    return redirect('home');
});

// Home route
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/libros', 'librosController@index')->name('libros_get');
Route::get('/libro/{$id}', 'libroController@index')->name('libro_get');

Route::get('/autores', 'autoresController@index')->name('autores_get');
Route::get('/autor/{$id}', 'autorController@index')->name('autor_get');

Route::get('/lomasleido', 'lomasleidoController@show')->name('lomasleido_get');

Route::get('/reviews', 'reviewController@show')->name('reviews_get');
//Route::post('/form', 'reviewController@store');

Route::get('/contacto', 'contactoController@show')->name('contacto_get');

Route::get('/privacidad', 'privacidadController@show')->name('privacidad_get');

Route::get('/avisolegal', 'avisolegalController@show')->name('avisolegal_get');

Route::get('/sitemap', 'sitemapController@show')->name('sitemap_get');

Route::get('/rss', 'rssController@show')->name('rss_get');

Route::post('/search', 'HomeController@search')->name('search');
Route::get('/search', 'HomeController@search')->name('search');

Route::group(['middleware' => 'guest'], function() {});

Route::group(['middleware' => 'auth'], function() {});
