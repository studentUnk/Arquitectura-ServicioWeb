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
        Schema::create('funcion_peliculas', function (Blueprint $table) {
            # primary key
            $table->integer('numero_funcion',true,false);

            $table->integer('numero_horario');
            $table->integer('numero_sala');
            $table->integer('numero_pelicula');
            $table->string('disponible_funcion');
            $table->double('valor_funcion',13,2);

            # foreign key
            $table->foreign('numero_horario')->references('numero_horario')->on('horarios');
            $table->foreign('numero_sala')->references('numero_sala')->on('salas');
            $table->foreign('numero_pelicula')->references('numero_pelicula')->on('peliculas');

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
        Schema::dropIfExists('funcion_peliculas');
    }
};
