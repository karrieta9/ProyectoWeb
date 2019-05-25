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
            $table->Increments('id');
            $table->unsignedInteger('NumOrden');
            $table->foreign('NumOrden')->references('Numero')->on('ordens');
            $table->unsignedInteger('CodPlato');
            $table->foreign('CodPlato')->references('codigo')->on('platos');
            $table->integer('cantidad');
            $table->double('Valor', 8, 2)->nullable();
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
