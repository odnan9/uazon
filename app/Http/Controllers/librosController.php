<?php

namespace App\Http\Controllers;

use App\Database\libros;
use App\Database\autores;
use App\Database\libros_autores;
use Cart;

class librosController extends Controller
{
  public function __construct()
  {
//        $this->middleware('auth');
  }

  public function index()
  {
    $cart = Cart::content();
    $listaLibros = libros::all();
    $listaAutores = autores::all();
    $listaLibrosAutores = libros_autores::all();
    return view('libros', ['seo_title'=>'Listado de libros','listaLibros' => $listaLibros, 'listaAutores' => $listaAutores, 'listaLibrosAutores' => $listaLibrosAutores,'cart' => $cart]);
  }
}
