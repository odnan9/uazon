<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class libros extends Model
{
    protected $table='libros';
    protected $keyType = 'string';
    protected $primaryKey = 'libros_id';
    protected $fillable = ['precio','num_votos','n_pags','editorial','titulo','voto','isbn'];
}
