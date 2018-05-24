<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class libros_autores extends Model
{
    protected $table='libros_autores';
    protected $keyType = 'string';
    protected $primaryKey = ['libros_libros_id,autores_autores_id'];
    protected $fillable = ['libros_libros_id','autores_autores_id','fecha'];
}
