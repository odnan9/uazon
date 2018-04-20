<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->increments('fotos_id');
            $table->integer('orden');
            $table->string('path_foto', 128);
            $table->integer('fk_libros')->unsigned();
            $table->timestamps();
        });

        Schema::table('fotos', function (Blueprint $table) {
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
        Schema::dropIfExists('fotos');
    }
}
