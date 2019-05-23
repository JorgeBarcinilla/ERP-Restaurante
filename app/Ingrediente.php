<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
     protected $fillable = ['Nombre','Proveedor'];
     protected $table  = "ingrediente";
     protected $primaryKey = 'Codigo';

     public function getRouteKeyName(){
          return 'Codigo';
     }

     public function platos(){
          return $this->belongsToMany(Plato::class, 'plato_ingrediente', 'CodIngrediente', 'CodPlato')->withPivot('Cantidad');
     }
}
