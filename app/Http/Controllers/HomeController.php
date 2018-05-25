<?php

namespace App\Http\Controllers;

use App\Database\pedidos_por_libro;
use Illuminate\Http\Request;
use App\Database\autores;
use App\Database\libros;
use App\Database\pedidos_libros;
use Cart;
use DB;

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
    $listaPedidos = DB::table('libros')
      ->join('pedidos_por_libro', 'libros.libros_id', '=', 'pedidos_por_libro.libros_id')
      ->select('libros.*','pedidos_por_libro.total_libros')
      ->where('pedidos_por_libro.total_libros', '>', 0)
      ->orderBy('pedidos_por_libro.total_libros', 'desc')
      ->get();

    return view('home', ['seo_title'=>'UAZON - Reeders meet books.',
                              'listaLibros' => $listaLibros,
                              'listaAutores' => $listaAutores,
                              'listaNovedades' => $listaNovedades,
                              'listaPedidos' => $listaPedidos,
                              'cart' => $cart
                             ]
               );
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

