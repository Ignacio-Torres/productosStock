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
            $table->id('id');
            $table->string('codigoUnico');
            $table->string('nombre');
            $table->unsignedBigInteger('idCategoria');
            $table->unsignedBigInteger('idSucursal');
            $table->text('descripcion');
            $table->integer('cantidad');
            $table->decimal('precio');
            $table->foreign('idCategoria')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('idSucursal')->references('id')->on('sucursales')->onDelete('cascade');
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
