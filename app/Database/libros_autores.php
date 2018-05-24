<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class libros_autores extends Model
{
    protected $table='libros_autores';
    protected $keyType = 'string';
    protected $primaryKey = ['fk_libros,fk_autores'];
    protected $fillable = ['fk_libros','fk_autores','fecha'];
}
