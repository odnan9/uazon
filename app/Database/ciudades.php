<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class ciudades extends Model
{
    protected $table='ciudades';
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','fk_paises','region'];
}
