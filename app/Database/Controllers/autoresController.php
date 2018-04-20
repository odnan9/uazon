<?php

namespace App\Database\Controllers;

use App\Database\autores;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class autoresController extends Controller
{
    public function index()
    {
        return autores::all();
    }

    public function show($id)
    {
        return autores::find($id);
    }

    public function store(Request $request)
    {
        $autor = autores::create($request->all());
        return response()->json($autor, 201);
    }

    public function update(Request $request, $id)
    {
        $autor = autores::find($id);
        $autor->update($request->all());
        return response()->json($autor, 201);
    }

    public function delete($id)
    {
        $autor = autores::find($id);
        $autor->delete();
        return response()->json(null, 204);
    }
}