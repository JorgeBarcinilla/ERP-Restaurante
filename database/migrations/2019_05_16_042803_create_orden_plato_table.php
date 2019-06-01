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
            $table->foreign('NumOrden')->references('Numero')->on('orden');
            $table->unsignedInteger('CodPlato');
            $table->foreign('CodPlato')->references('Codigo')->on('plato');
            $table->integer('Cantidad');
            $table->double('Valor');
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
        Schema::dropIfExists('orden_plato');
    }
}
