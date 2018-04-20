<?php

namespace App\Database\Controllers;

use App\Database\comentarios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class comentariosController extends Controller
{
    public function show($id)
    {
        return comentarios::find($id);
    }

    public function store(Request $request)
    {
        $comentario = comentarios::create($request->all());
        return response()->json($comentario, 201);
    }

    public function update(Request $request, $id)
    {
        $comentario = comentarios::find($id);
        $comentario->update($request->all());
        return response()->json($comentario, 200);
    }

    public function delete($id)
    {
        $comentario = comentarios::find($id);
        $comentario->delete();
        return response()->json(null, 204);
    }
}
