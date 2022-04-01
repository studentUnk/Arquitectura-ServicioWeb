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
        Schema::create('pagos', function (Blueprint $table) {
            # primary key
            $table->integer('numero_pago',true,false);

            $table->double('valor_total_pago',13,2);
            $table->integer('numero_ingreso');

            # foreign key
            $table->foreign('numero_ingreso')->references('numero_ingreso')->on('ingresos');

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
        Schema::dropIfExists('pagos');
    }
};
