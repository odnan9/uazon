<?php

namespace App\Database\Controllers;

use App\Database\paises;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class paisesController extends Controller
{
    public function index()
    {
        return paises::all();
    }

    public function show($id)
    {
        return paises::find($id);
    }

    public function store(Request $request)
    {
        $pais = paises::create($request->all());
        return response()->json($pais, 201);
    }

    public function update(Request $request, $id)
    {
        $pais = paises::find($id);
        $pais->update($request->all());
        return response()->json($pais, 200);
    }

    public function delete($id)
    {
        $pais = paises::find($id);
        $pais->delete();
        return response()->json(null, 204);
    }
}
