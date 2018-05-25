<?php

namespace App\Http\Controllers\Database\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Database\pedidos_por_libro;

class pedidos_por_libroController extends Controller
{
  public function index()
  {
    return pedidos_por_libro::all();
  }

  public function show($id)
  {
    return DB::table('pedidos_por_libro')
      ->where('libros_id', '=', $id)
      ->select('*')
      ->get();
  }
}
