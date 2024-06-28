<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleRemisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_remisiones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('remision_id');
            $table->unsignedInteger('producto_id');
            $table->integer('cantidad');
            $table->integer('precio_unitario');
            $table->integer('subtotal');
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('remision_id')->references('id')->on('remisiones')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_remisiones');
    }
}
