<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Favoritos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favoritos', function (Blueprint $table) {
            $table->increments('id_favorito')->primary;
            $table->integer('id_anuncio')->unsigned();
            $table->integer('id_utilizador')->unsigned();
            $table->foreign('id_anuncio')->references('id_anuncio')->on('anuncios')->onDelete('cascade');
            $table->foreign('id_utilizador')->references('id')->on('utilizadores')->onDelete('cascade');
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
        Schema::dropIfExists('favoritos');
    }
}
