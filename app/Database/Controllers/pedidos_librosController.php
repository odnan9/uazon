<?php

namespace App\Database\Controllers;

use App\Database\pedidos_libros;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class pedidos_librosController extends Controller
{
    public function index()
    {
        return pedidos_libros::all();
    }

    public function show($id)
    {
        return DB::table('pedidos_libros')
            ->where('fk_pedidos', '=', $id)
            ->join('libros', 'pedidos_libros.fk_libros', '=', 'libros.libros_id')
            ->select('pedidos_libros.*','libros.*')
            ->get();
    }

    public function store(Request $request)
    {
        $pedido_libros = pedidos_libros::create($request->all());
        return response()->json($pedido_libros, 201);
    }

    public function update(Request $request, $id)
    {
        $pedido_libros = pedidos_libros::find($id);
        $pedido_libros->update($request->all());
        return response()->json($pedido_libros, 200);
    }

    public function delete($id)
    {
        $pedido_libros = pedidos_libros::find($id);
        $pedido_libros->delete();
        return response()->json(null, 204);
    }
}
