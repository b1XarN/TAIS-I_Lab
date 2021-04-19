<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    protected $table="indicador";
    protected $primaryKey='ind_id';
    public $timestamps=false;

    protected $fillable=[
        'ind_nombre','ind_unidad','ind_responsable','ind_objetivo','ind_meta','ind_rojo','ind_amarillo','ind_verde','sub_id','emp_ruc'
    ];

    public function Subproceso(){
        return $this->hasOne('App\Subproceso','sub_id','sub_id');
    }
}
