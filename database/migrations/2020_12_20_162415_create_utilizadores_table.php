<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilizadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilizadores', function (Blueprint $table) {
            $table->increments('id')->primary;
            $table->string('nome',60)->nullable(false);
            $table->string('apelido',60)->nullable(false);
            $table->string('email',60)->nullable(false)->unique;
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('telefone')->nullable()->unique;
            $table->rememberToken();
            $table->date('data_nascimento')->nullable(false);
            $table->char('sexo')->nullable(false);
            $table->string('tipovendedor',15)->nullable(false);
            $table->tinyinteger('admin')->nullable(false);
            $table->string('password')->nullable(false);
            $table->integer('id_freguesia')->unsigned();
            $table->foreign('id_freguesia')->references('id_freguesia')->on('freguesias')->onDelete('cascade');
            $table->string('foto_perfil')->nullable(false);
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
        Schema::dropIfExists('utilizadores');
    }
}
