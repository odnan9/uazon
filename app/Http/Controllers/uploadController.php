<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database\fotos;
use App\Database\libros;
use Storage;

class uploadController extends Controller
{
    public function __construct() { }

    public function store(Request $request, $id) {
        if (!$libro  = libros::find($id)) {
            return 'Error: libro no encontrado';
        }
        $filename = $request->input('filename');
        $path = 'public/images/' . $request->input('path');

          Storage::putFileAs(
            $path.$id,
            $request->file('data'),
            $filename
        );

        fotos::create(['orden' => 1,'path_foto' => $path.$filename,'fk_libros' => $id]);
    }
}

