<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario2 extends Model
{
    protected $table="usuario";
    protected $primaryKey='usu_id';
    public $timestamps=false;

    protected $fillable=[
        'usu_nombre','usu_apellido','usu_dni','usu_contra','usu_estado'
    ];
}
