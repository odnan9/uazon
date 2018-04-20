<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosAutoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros_autores', function (Blueprint $table) {
            $table->integer('fk_libros')->unsigned();
            $table->integer('fk_autores')->unsigned();
            $table->date('fecha');
            $table->timestamps();
        });

        Schema::table('libros_autores', function (Blueprint $table) {
            $table->foreign('fk_libros')->references('libros_id')->on('libros');
            $table->foreign('fk_autores')->references('autores_id')->on('autores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros_autores');
    }
}
