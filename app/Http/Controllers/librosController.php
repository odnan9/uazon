<?php

namespace App\Http\Controllers;

use App\Database\libros;
use Illuminate\Http\Request;

class librosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listaLibros = libros::all();
        return view('libros', ['seo_title'=>'Listado de libros','listadoLibros' => $listaLibros]);
    }
}
