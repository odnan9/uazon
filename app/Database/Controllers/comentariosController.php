<?php

namespace App\Database\Controllers;

use App\Database\comentarios;
use App\Database\libros;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class comentariosController extends Controller
{
    public function index()
    {
        return DB::table('comentarios')
            ->join('libros','comentarios.fk_libros', '=', 'libros.libros_id')
            ->select('comentarios.*','libros.titulo')
            ->orderBy('comentarios.comentarios_id')
            ->get();
    }

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
