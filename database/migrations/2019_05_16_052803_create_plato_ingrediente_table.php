<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatoIngredienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plato_ingrediente', function (Blueprint $table) {
            $table->increments('Id');
            $table->unsignedInteger('CodPlato');
            $table->foreign('CodPlato')->references('Codigo')->on('plato');
            $table->unsignedInteger('CodIngrediente');
            $table->foreign('CodIngrediente')->references('Codigo')->on('ingrediente');
            $table->float('Cantidad');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plato_ingrediente');
    }
}
