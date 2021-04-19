<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subproceso extends Model
{
    protected $table="subproceso";
    protected $primaryKey='sub_id';
    public $timestamps=false;

    protected $fillable=[
        'sub_nombre','sub_responsable','pro_id','emp_ruc'
    ];
}
