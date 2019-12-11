<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    //Atributos que se van a modificar
    protected $fillable = [
        'title' , 'content', 'user_id'
    ];


    public function user(){
        //Buscara el usuario que creo el post
        return $this->belongsTo('App\User', 'user_id');
        //return $this->belongsTo('Modelo a comparar', 'llave foranea actual, que se relaciona al modelo a comparar');
    }

    public function comments(){
        //Buscara todos los comentarios que tiene el post
        return $this->hasMany('App\Models\Comment', 'post_id', 'id');
        //return $this->hasMany('Modelo a cruzar con el actual', 'llave foranea a comprar', 'llave del modelo actual');

    }


}
