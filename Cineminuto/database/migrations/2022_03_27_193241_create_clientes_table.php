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
        Schema::create('clientes', function (Blueprint $table) {
            $table->integer('documento_cliente',true,false);
            $table->string('nombre_cliente');
            $table->string('apellido_cliente');
            $table->string('genero_cliente');
            $table->string('celular_cliente');
            $table->integer('telefono_cliente');
            $table->string('correo_cliente');
            $table->string('direccion_cliente');
            $table->string('password_cliente');
            $table->string('fecha_nacimiento_cliente');
            $table->rememberToken();
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
        Schema::dropIfExists('clientes');
    }
};
