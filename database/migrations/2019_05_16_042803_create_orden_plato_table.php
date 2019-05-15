<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenPlatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_plato', function (Blueprint $table) {
            $table->increments('Id');
            $table->unsignedInteger('NumOrden');
            $table->foreign('NumOrden','fk_ordenplato_orden')->references('Numero')->on('orden')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('CodPlato');
            $table->foreign('CodPlato','fk_ordenplato_plato')->references('Codigo')->on('plato')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('Cantidad');
            $table->float('Valor');
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
        Schema::dropIfExists('_orden_plato');
    }
}
