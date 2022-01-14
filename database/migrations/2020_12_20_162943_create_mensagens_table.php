<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasTable('mensagens') ) {
        Schema::create('mensagens', function (Blueprint $table) {
            $table->increments('id_mensagem')->primary;
            $table->integer('id_emissor')->unsigned();
            $table->integer('id_recetor')->unsigned();
            $table->integer('id_anuncio')->unsigned();
            $table->integer('id_conversa')->unsigned();
            $table->foreign('id_conversa')->references('id_conversa')->on('conversas')->onDelete('cascade');
            $table->foreign('id_anuncio')->references('id_anuncio')->on('anuncios')->onDelete('cascade');
            $table->foreign('id_emissor')->references('id')->on('utilizadores')->onDelete('cascade');
            $table->foreign('id_recetor')->references('id')->on('utilizadores')->onDelete('cascade');
            $table->string('texto')->nullable(false);
            $table->date('data')->nullable(false);
            $table->string('fotos',99);
            $table->tinyinteger('visto')->nullable(false);
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
        Schema::dropIfExists('mensagens');
    }
}
