<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatoIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plato_ingredientes', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('CodPlato');
            $table->foreign('CodPlato')->references('codigo')->on('platos');
            $table->unsignedInteger('CodIngrediente');
            $table->foreign('CodIngrediente')->references('codigo')->on('ingredientes');
            $table->double('cantidad', 8, 2);
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
        Schema::dropIfExists('plato_ingredientes');
    }
}
