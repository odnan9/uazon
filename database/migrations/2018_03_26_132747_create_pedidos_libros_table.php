<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_libros', function (Blueprint $table) {
            $table->integer('fk_pedidos')->unsigned();
            $table->integer('fk_libros')->unsigned();
            $table->integer('cantidad');
            $table->float('precio');
            $table->timestamps();
        });

        Schema::table('pedidos_libros', function (Blueprint $table) {
            $table->foreign('fk_pedidos')->references('pedidos_id')->on('pedidos');
            $table->foreign('fk_libros')->references('libros_id')->on('libros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos_libros');
    }
}
