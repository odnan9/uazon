<?php

namespace App\Database\Controllers;

use App\Database\libros;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class librosController extends Controller
{
    public function show($id)
    {
        return libros::find($id);
    }

    public function store(Request $request)
    {
        $libro = libros::create($request->all());
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
        return response()->json(null, 204);
    }
}
