<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database\pedidos_por_libro;
use App\Database\autores;
use App\Database\libros;
use App\Database\pedidos_libros;
use Cart;
use DB;

class lomasleidoController extends Controller
{
  public function __construct()
  {
//    $this->middleware('guest');
  }

  public function index()
  {
    $cart = Cart::content();
    $listaAutores = autores::all();
    $listaPedidos = DB::table('libros')
      ->join('pedidos_por_libro', 'libros.libros_id', '=', 'pedidos_por_libro.libros_id')
      ->select('libros.*','pedidos_por_libro.total_libros')
      ->where('pedidos_por_libro.total_libros', '>', 0)
      ->orderBy('pedidos_por_libro.total_libros', 'desc')
      ->get();

    return view('lomasleido', ['seo_title'=>'UAZON - Reeders meet books.',
        'listaAutores' => $listaAutores,
        'listaPedidos' => $listaPedidos,
        'cart' => $cart
      ]
    );
  }
}
