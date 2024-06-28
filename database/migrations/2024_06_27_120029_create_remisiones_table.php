<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remisiones', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->integer('total');
            $table->string('meotodo_pago', 255);
            $table->unsignedInteger('cliente_id');
            $table->unsignedInteger('usuario_creacion');
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
        Schema::dropIfExists('remisiones');
    }
}
