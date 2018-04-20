<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('comentarios_id');
            $table->string('autor', 64);
            $table->text('descripcion');
            $table->tinyInteger('validado');
            $table->integer('fk_libros')->unsigned();
            $table->timestamps();
        });

        Schema::table('comentarios', function (Blueprint $table) {
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
        Schema::dropIfExists('comentarios');
    }
}
