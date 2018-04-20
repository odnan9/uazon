<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class paises extends Model
{
    protected $table='paises';
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre'];
}
