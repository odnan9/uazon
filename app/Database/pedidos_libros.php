<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class pedidos_libros extends Model
{
  protected $table = 'pedidos_libros';
  protected $keyType = 'string';
  protected $primaryKey = '[fk_pedidos,fk_libros]';
  protected $casts = [
    'fk_pedidos' => 'integer',
    'fk_libros' => 'integer',
    'cantidad' => 'integer',
    'precio' => 'float'
  ];
  protected $fillable = ['fk_pedidos','fk_libros','cantidad','precio'];
}
