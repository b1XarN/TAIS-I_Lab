<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table="empresa";
    protected $primaryKey='emp_ruc';
    public $timestamps=false;

    protected $fillable=[
        'emp_nombre','emp_direccion','emp_estado'
    ];
}
