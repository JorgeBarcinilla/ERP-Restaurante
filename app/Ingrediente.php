<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
     protected $fillable = ['Nombre','Proveedor'];
     protected $table  = "ingrediente";

     public function getRouteKeyName(){
          return 'Codigo';
     }

}
