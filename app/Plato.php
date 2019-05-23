<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $fillable = ['Nombre','Valor'];
     protected $table  = "plato";
     protected $primaryKey = 'Codigo';

     public function getRouteKeyName(){
          return 'Codigo';
     }

     public function ingredientes(){
          return $this->belongsToMany(Ingrediente::class, 'plato_ingrediente', 'CodPlato', 'CodIngrediente');
     }
}
