<?php

namespace App\Database;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';
    protected $keyType = 'string';
    protected $primaryKey = 'id';

//    protected $casts = [
//        'admin' => 'boolean',
//    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'email', 'password', 'admin', 'cp', 'fk_ciudades'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public static function create($callback)
//    {
//        info('This is just a NANDO TEST');
//    }
}
