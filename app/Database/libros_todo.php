<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class libros_todo extends Model
{
  use SearchableTrait;

  protected $table='libros_todo';
  protected $keyType = 'string';
  protected $primaryKey = 'libros_id';
  protected $fillable = ['precio','num_votos','n_pags','editorial','titulo','voto','isbn','nombre','fecha','orden','path_foto'];

  protected $searchable = [
    'columns' => [
      'libros_todo.titulo' => 10,
      'libros_todo.editorial' => 9,
      'libros_todo.precio' => 9,
      'libros_todo.isbn' => 8,
      'libros_todo.nombre' => 8
    ],
  ];
}
