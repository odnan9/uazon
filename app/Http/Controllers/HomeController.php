<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database\autores;
use App\Database\ciudades;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('guest');
    }

    public function index()
    {
//        $testea = ciudades::all();
//        foreach ($testea as $testeados) {
//            echo $testeados->nombre;
//            $kktua = $testeados;
//        }
//        return view('home', ['kktua' => $testea]);
        return view('home', ['seo_title'=>'Home Page SEO']);
    }
}
