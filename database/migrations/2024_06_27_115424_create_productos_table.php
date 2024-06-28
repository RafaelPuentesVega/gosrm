<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id'); // ID_Producto
            $table->string('nombre', 255);
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 10, 2);
            $table->integer('id_categoria');
            $table->string('marca', 250)->nullable();
            $table->string('modelo', 250)->nullable();
            $table->string('estado', 20);
            $table->integer('cantidad_stock');
            $table->string('proveedor', 255)->nullable();
            $table->decimal('precio_compra', 10, 2)->nullable();
            $table->string('codigo_barras', 250)->unique();
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
        Schema::dropIfExists('productos');
    }
}
