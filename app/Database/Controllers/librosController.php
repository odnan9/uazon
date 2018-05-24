<?php

namespace App\Database\Controllers;

use App\Database\libros;
use App\Database\libros_autores;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class librosController extends Controller
{
    public function index()
    {
        return DB::table('libros_autores')
            ->join('libros','libros_autores.libros_libros_id', '=', 'libros.libros_id')
            ->join('autores', 'libros_autores.autores_autores_id', '=', 'autores.autores_id')
            ->join('fotos', 'fotos.fk_libros', '=', 'libros.libros_id')
            ->select('libros.*','autores.autores_id','autores.nombre as autor','fotos.path_foto','fotos.orden as orden_foto')
            ->orderBy('libros.libros_id')
            ->get();
    }

    public function show($id)
    {
        return DB::table('libros_autores')
            ->where('libros_id', '=', $id)
            ->join('libros','libros_autores.libros_libros_id', '=', 'libros.libros_id')
            ->join('autores', 'libros_autores.autores_autores_id', '=', 'autores.autores_id')
            ->join('fotos', 'libros_autores.libros_libros_id', '=', 'fotos.fk_libros')
            ->select('libros.*','autores.autores_id','autores.nombre as autor', 'fotos.fotos_id', 'fotos.orden as fotos_orden', 'fotos.path_foto')
            ->get();
    }

    public function store(Request $request)
    {
        $libro = libros::create($request->all());
        $libros_autores = libros_autores::create(['autores_autores_id' => $request['autores_id'], 'libros_libros_id' => $libro['libros_id'], 'fecha' => now()]);
        return response()->json($libro, 201);
    }

    public function update(Request $request, $id)
    {
        $libro = libros::find($id);
        $libro->update($request->all());
        return response()->json($libro, 200);
    }

    public function delete($id)
    {
        $libro = libros::find($id);
        $libro->delete();
        $libro_autores = libros_autores::where('libros_libros_id',$id)->first();
        $libro_autores->delete();
        return response()->json(null, 204);
    }
}
