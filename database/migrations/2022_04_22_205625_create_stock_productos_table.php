<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockProductos', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idproducto');
            $table->unsignedBigInteger('idSucursal');            
            $table->integer('cantidad');
            $table->decimal('precio');
            $table->boolean('activo');
            $table->foreign('idProducto')->references('id')->on('productos')->onDelete('cascade');
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
        //
    }
}
