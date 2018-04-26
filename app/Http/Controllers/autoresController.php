<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database\autores;

class autoresController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $listaAutores = autores::all();
        return view('autores', ['seo_title'=>'Listado de autores','listaAutores' => $listaAutores]);
    }
}
