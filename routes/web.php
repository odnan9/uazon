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
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
//Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
//Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
//Route::post('password/reset', 'Auth\PasswordController@reset');
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

Route::get('/libros', 'librosController@index')->name('libros');
Route::get('/libro/{$id}', 'libroController@index')->name('libro');

Route::get('/autores', 'autoresController@index')->name('autores');
Route::get('/autor/{$id}', 'autorController@index')->name('autor');

Route::get('/reviews', 'ReviewController@show')->name('reviews_get');
Route::post('/form', 'ReviewController@store');

//// Angular route
//Route::get('/cms/{js_route}', function() {
//    return File::get(public_path() . '/uazon-cms/src/index.html');;
////    /var/www/html/uazon/public/uazon-cms/src/index.html
//})->where('js_route', '(.*)'); // Allow multiple URI segments
//


Route::group(['middleware' => 'guest'], function() {
});

Route::group(['middleware' => 'auth'], function() {

});