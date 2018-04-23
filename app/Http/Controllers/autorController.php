<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database\autores;

class autorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('autor', ['seo_title'=>'Detalles del autor']);
    }
}
