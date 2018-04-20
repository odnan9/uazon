<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database\autores;
use App\Database\ciudades;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
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
