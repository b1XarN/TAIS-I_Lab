<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table="usuario";
    public $timestamps=false;

    protected $fillable=[
        'usu_id','usu_nombre','usu_apellido','usu_dni','usu_contra','usu_estado'
    ];
}
