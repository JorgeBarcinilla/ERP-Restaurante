<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlatoIngrediente extends Model
{
    protected $fillable = ['Cantidad'];
     protected $table  = "PlatoIngrediente";
     protected $primaryKey = 'Id';

     public function getRouteKeyName(){
          return 'Id';
     }
}
