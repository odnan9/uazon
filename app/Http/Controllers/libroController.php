<?php

namespace App\Http\Controllers;

use App\Database\libros;
use App\Database\autores;
use Cart;

class libroController extends Controller
{
  public function __construct()
  {
//        $this->middleware('auth');
  }

  public function index($id)
  {
    $cart = Cart::content();
    $libro = libros::find($id);
    $autor = libros::find($id)->autores()->pluck('nombre')[0];
    return view('libro', ['seo_title'=>'Listado de libros','libro' => $libro, 'autor' => $autor, 'cart' => $cart]);
  }
}
