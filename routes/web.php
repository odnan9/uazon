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
Route::get('/', 'HomeController@index');

Route::get('/libros', 'librosController@index')->name('libros');
Route::get('/libro/{id}', 'libroController@index')->name('libro');

Route::get('/autores', 'autoresController@index')->name('autores');
Route::get('/autor/{id}', 'autorController@index')->name('autor');

Route::get('/lomasleido', 'lomasleidoController@show')->name('lomasleido');

Route::get('/reviews', 'reviewController@show')->name('reviews');
//Route::post('/form', 'reviewController@store');

Route::get('/contacto', 'contactoController@show')->name('contacto');

Route::get('/privacidad', 'privacidadController@show')->name('privacidad');

Route::get('/avisolegal', 'avisolegalController@show')->name('avisolegal');

Route::get('/sitemap', 'sitemapController@show')->name('sitemap');

Route::get('/rss', 'rssController@show')->name('rss');

Route::post('/search', 'HomeController@search')->name('search');
Route::get('/search', 'HomeController@search')->name('search');

Route::get('/cart', 'shoppingCartController@cart');
Route::post('/cart', 'shoppingCartController@cart');

# Middleware groups
Route::group(['middleware' => 'guest'], function() {});
Route::group(['middleware' => 'auth'], function() {});


