<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_reservas', function (Blueprint $table) {
            # primary key
            $table->integer('numero_detalle_reserva',true,false);

            $table->integer('numero_ingreso');
            $table->integer('numero_funcion');
            $table->integer('numero_asiento');
            $table->double('valor_funcion',13,2);

            # foreign key
            $table->foreign('numero_ingreso')->references('numero_ingreso')->on('ingresos');
            $table->foreign('numero_funcion')->references('numero_funcion')->on('funcion_peliculas');
            $table->foreign('numero_asiento')->references('numero_asiento')->on('asientos');

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
        Schema::dropIfExists('detalle_reservas');
    }
};
