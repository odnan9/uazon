<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class libros extends Model
{
  use SearchableTrait;

  protected $table='libros';
  protected $keyType = 'string';
  protected $primaryKey = 'libros_id';
  protected $fillable = ['precio','num_votos','n_pags','editorial','titulo','voto','isbn'];
  protected $searchable = [
    'columns' => [
      'libros.titulo' => 10,
      'libros.editorial' => 9,
      'libros.precio' => 9,
      'libros.isbn' => 8,
    ]
  ];

  public function autores()
  {
    return $this->belongsToMany('App\Database\autores');
  }
}
