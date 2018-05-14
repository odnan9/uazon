<?php

namespace App\Database\Controllers;

use App\Database\ciudades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ciudadesController extends Controller
{
    public function index()
    {
        return paises::all();
    }

    public function show($id)
    {
        return ciudades::find($id);
    }

    public function store(Request $request)
    {
        $ciudad = ciudades::create($request->all());
        return response()->json($ciudad, 201);
    }

    public function update(Request $request, $id)
    {
        $ciudad = ciudades::find($id);
        $ciudad->update($request->all());
        return response()->json($ciudad, 200);
    }

    public function delete($id)
    {
        $ciudad = ciudades::find($id);
        $ciudad->delete();
        return response()->json(null, 204);
    }
}
