<?php

namespace App\Database\Controllers;

use App\Database\pedidos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pedidosController extends Controller
{
    public function show($id)
    {
        return pedidos::find($id);
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
