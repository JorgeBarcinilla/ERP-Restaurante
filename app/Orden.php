<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $fillable = ['Estado'];
    protected $table  = "orden";
    protected $primaryKey = 'Numero';

     public function getRouteKeyName(){
          return 'Numero';
     }

     public function platos(){
        return $this->belongsToMany(Plato::class, 'orden_plato', 'NumOrden', 'CodPlato');
    }
}
