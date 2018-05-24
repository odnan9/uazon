<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database\autores;
use App\Database\libros;
use Cart;

class HomeController extends Controller
{
  public function __construct()
  {
//    $this->middleware('guest');
  }

  public function index()
  {
    $cart = Cart::content();
    $listaLibros = libros::all();
    $listaAutores = autores::all();
    $listaNovedades = libros::orderBy('created_at', 'desc')->get();
    return view('home', ['seo_title'=>'UAZON - Reeders meet books.','listaLibros' => $listaLibros,'listaAutores' => $listaAutores, 'listaNovedades' => $listaNovedades, 'cart' => $cart]);
  }

  public function search(Request $request) {
    if($request->has('search')){
      $libros = libros::search($request->get('search'))->get()->toArray();
      $autores = autores::search($request->get('search'))->get()->toArray();
    }else{
      $libros = libros::get();
      $autores = autores::get();
    }

    return view('search', compact('libros','autores'));
  }
}

