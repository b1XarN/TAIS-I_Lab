<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iniciativa extends Model
{
    protected $table="iniciativa";
    protected $primaryKey='ini_id';
    public $timestamps=false;

    protected $fillable=[
        'ini_nombre','ind_id'
    ];

    public function Indicador(){
        return $this->hasOne('App\Indicador','ind_id','ind_id');
    }
}
