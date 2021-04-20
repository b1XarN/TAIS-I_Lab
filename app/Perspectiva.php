<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perspectiva extends Model
{
    protected $table="perspectiva";
    protected $primaryKey='per_id';
    public $timestamps=false;

    protected $fillable=[
        'per_nombre'
    ];
}
