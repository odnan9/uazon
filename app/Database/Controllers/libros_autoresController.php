<?php

namespace App\Database\Controllers;

use App\Database\libros_autores;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class libros_autoresController extends Controller
{
    public function show($id)
    {
        return libros_autores::find($id);
    }

    public function store(Request $request)
    {
        $libro_autor = libros_autores::create($request->all());
        return response()->json($libro_autor, 201);
    }

    public function update(Request $request, $id)
    {
        $libro_autor = libros_autores::find($id);
        $libro_autor->update($request->all());
        return response()->json($libro_autor, 200);
    }

    public function delete($id)
    {
        $libro_autor = libros_autores::find($id);
        $libro_autor->delete();
        return response()->json(null, 204);
    }
}
