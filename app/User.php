<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Devolvera todos los post que un usuario tiene asociado
    public function posts()
    {
        //hasMany(Modelo a comparar) ira a buscar todos los post que concuerden con el id del usuario en la tabla posts
        return $this->hasMany('App\Models\Post', 'user_id', 'id');

        //return $this->hasMany('Modelo a cruzar con el actual', 'llave foranea a comprar', 'llave del modelo actual');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment', 'user_id', 'id');
    }

}
