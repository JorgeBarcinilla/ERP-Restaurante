<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenPlato extends Model
{
    protected $fillable = ['Cantidad','Valor'];
     protected $table  = "orden_plato";
     protected $primaryKey = 'Id';

     public function getRouteKeyName(){
          return 'Id';
     }
}
