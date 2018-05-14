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
        return view('home', ['seo_title'=>'Home Page SEO']);
    }
}
