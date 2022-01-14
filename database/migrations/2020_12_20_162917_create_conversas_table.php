<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('conversas')) {
            Schema::create('conversas', function (Blueprint $table) {
                $table->increments('id_conversa')->primary;
                $table->integer('id_emissor')->unsigned();
                $table->integer('id_recetor')->unsigned();
                $table->integer('id_anuncio')->unsigned();
                $table->foreign('id_anuncio')->references('id_anuncio')->on('anuncios')->onDelete('cascade');
                $table->foreign('id_emissor')->references('id')->on('utilizadores')->onDelete('cascade');
                $table->foreign('id_recetor')->references('id')->on('utilizadores')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversas');
    }
}
