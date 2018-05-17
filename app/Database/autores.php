<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class autores extends Model
{
  use SearchableTrait;
  protected $table='autores';
  protected $keyType = 'string';
  protected $primaryKey = 'autores_id';
  protected $fillable = ['nombre'];
  protected $searchable = [
    'columns' => [
      'autores.nombre' => 10,
    ]
  ];
}
