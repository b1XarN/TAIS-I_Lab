<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $table="proceso";
    protected $primaryKey='pro_id';
    public $timestamps=false;

    protected $fillable=[
        'emp_ruc','pro_nombre'
    ];
}
