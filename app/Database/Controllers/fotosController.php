<?php

namespace App\Database\Controllers;

use App\Database\fotos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class fotosController extends Controller
{
    public function index()
    {
        return fotos::all();
    }

    public function show($id)
    {
        return fotos::find($id);
    }

    public function store(Request $request)
    {
        $foto = fotos::create($request->all());
        return response()->json($foto, 201);
    }

    public function update(Request $request, $id)
    {
        $foto = fotos::find($id);
        $foto->update($request->all());
        return response()->json($foto, 200);
    }

    public function delete($id)
    {
        $foto = fotos::find($id);
        $foto->delete();
        return response()->json(null, 204);
    }
}
