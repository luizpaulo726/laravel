<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLivros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('ano');
            $table->integer('autor_id')->unsigned();
            $table->foreign('autor_id')->references('id')->on('autores');
            $table->integer('editora_id')->unsigned();
            $table->foreign('editora_id')->references('id')->on('editoras');
            $table->integer('gen_literario_id')->unsigned();
            $table->foreign('gen_literario_id')->references('id')->on('generos_literarios');
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
        Schema::dropIfExists('livros');
    }
}
