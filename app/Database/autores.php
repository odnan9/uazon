<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class autores extends Model
{
    protected $table='autores';
    protected $keyType = 'string';
    protected $primaryKey = 'autores_id';
    protected $fillable = ['nombre'];
}
