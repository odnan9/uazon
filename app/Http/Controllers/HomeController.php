<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database\autores;
use App\Database\libros;

class HomeController extends Controller
{
  public function __construct()
  {
//    $this->middleware('guest');
  }

  public function index()
  {
    return view('home', ['seo_title'=>'UAZON - Reeders meet books.']);
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

