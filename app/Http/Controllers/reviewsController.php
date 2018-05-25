<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;

class reviewsController extends Controller
{

  public function __construct()
  {
//    $this->middleware('App\Http\Middleware\checkIpLang');
  }

  public function index()
  {
    $cart = Cart::content();
    $listaCriticas = DB::table('libros')
      ->select('libros.*')
      ->where('libros.critica', '!=', null)
      ->get();

    return view('reviews.reviews', ['seo_title' => 'UAZON - Reeders meet books.',
        'listaPedidos' => $listaCriticas,
        'cart' => $cart
      ]
    );
  }

  public function show($id)
  {
    $cart = Cart::content();
    $libro = DB::table('libros')
      ->select('libros.*')
      ->where('libros_id', '=', $id)
      ->where('libros.critica', '!=', null)
      ->get();

    return view('reviews.review', ['seo_title' => 'UAZON - Reeders meet books.',
        'libro' => $libro[0],
        'cart' => $cart
      ]
    );
  }
}
