<?php

namespace App\Database\Controllers;

use App\Database\pedidos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class pedidosController extends Controller
{
    public function index()
    {
        return DB::table('pedidos')
            ->leftJoin('pedidos_libros','pedidos.pedidos_id', '=', 'pedidos_libros.fk_pedidos')
            ->join('users', 'pedidos.fk_users', '=', 'users.id')
            ->select('pedidos.*','users.*')
            ->groupBy('pedidos.pedidos_id')
            ->orderBy('pedidos.pedidos_id')
            ->get();
    }

    public function show($id)
    {
        return DB::table('pedidos')
            ->where('pedidos_id', '=', $id)
            ->select('pedidos.*')
            ->orderBy('pedidos.pedidos_id')
            ->get();
    }

    public function store(Request $request)
    {
        $pedido = pedidos::create($request->all());
        return response()->json($pedido, 201);
    }

    public function update(Request $request, $id)
    {
        $pedido = pedidos::find($id);
        $pedido->update($request->all());
        return response()->json($pedido, 200);
    }

    public function delete($id)
    {
        $pedido = pedidos::find($id);
        $pedido->delete();
        return response()->json(null, 204);
    }
}
