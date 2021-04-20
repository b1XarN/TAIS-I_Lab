<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Estrategia extends Model
{
    protected $table="estrategia";
    protected $primaryKey='est_id';
    public $timestamps=false;

    protected $fillable=[
        'est_nombre','per_id','sub_id'
    ];

    public function Perspectiva(){
        return $this->hasOne('App\Perspectiva','per_id','per_id');
    }
    
}
