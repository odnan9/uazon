<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class fotos extends Model
{
    protected $table='fotos';
    protected $keyType = 'string';
    protected $primaryKey = 'fotos_id';
    protected $fillable = ['orden','path_foto','fk_libros'];
}
