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
        Schema::create('salas', function (Blueprint $table) {
            # primary key
            $table->integer('numero_sala',true,false);

            $table->string('nombre_sala');
            $table->integer('id_tipo_sala');

            # foreign key
            $table->foreign('id_tipo_sala')->references('id_tipo_sala')->on('tipo_salas');

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
        Schema::dropIfExists('salas');
    }
};
