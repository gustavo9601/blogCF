<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Atributos que se van a modificar
    protected $fillable = [
        'title' , 'content', 'user_id'
    ];
}
