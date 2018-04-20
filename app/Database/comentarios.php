<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class comentarios extends Model
{
    protected $table='comentarios';
    protected $keyType = 'string';
    protected $primaryKey = 'comentarios_id';
    protected $fillable = ['autor','descripcion','validado','fk_libros'];
}
