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
            $table->foreign('CodPlato','fk_platoingrediente_plato')->references('Codigo')->on('plato')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('CodIngrediente');
            $table->foreign('CodIngrediente','fk_platoingrediente_ingrediente')->references('Codigo')->on('ingrediente')->onDelete('restrict')->onUpdate('restrict');
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
