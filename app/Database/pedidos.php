<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    protected $table='pedidos';
    protected $keyType = 'string';
    protected $primaryKey = 'pedidos_id';
    protected $fillable = ['pagado','total','fecha','fk_users'];
}
