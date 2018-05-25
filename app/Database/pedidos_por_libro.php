<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;


class pedidos_por_libro extends Model
{
  protected $table = 'pedidos_por_libro';
  protected $keyType = 'integer';
  protected $primaryKey = '[libros_id,total_libros]';
  protected $casts = [
    'libros_id' => 'integer',
    'total_libros' => 'integer',
  ];
  protected $fillable = ['libros_id','total_libros'];
}
