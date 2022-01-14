<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->increments('id_anuncio')->primary;
            $table->integer('id_utilizador')->unsigned();
            $table->foreign('id_utilizador')->references('id')->on('utilizadores')->onDelete('cascade');
            $table->string('descricao', 9000)->nullable(false);
            $table->string('titulo', 90)->nullable(false);
            $table->tinyinteger('valor_fixo')->nullable(false);
            $table->integer('preco')->nullable(false);
            $table->integer('id_modelo')->unsigned();
            $table->integer('id_marca')->unsigned();
            $table->foreign('id_marca')->references('id_marca')->on('marcas')->onDelete('cascade');
            $table->foreign('id_modelo')->references('id_modelo')->on('modelos')->onDelete('cascade');
            $table->string('cor', 10)->nullable(false);
            $table->date('data_registo')->nullable(false);
            $table->tinyinteger('estado')->nullable(false);
            $table->string('versao', 60)->nullable(false);
            $table->string('combustivel', 30)->nullable(false);
            $table->integer('quilometragem')->nullable(false);
            $table->integer('potencia')->nullable(false);
            $table->integer('cilindrada')->nullable(false);
            $table->tinyinteger('retoma')->nullable(false);
            $table->tinyinteger('financiamento')->nullable(false);
            $table->string('segmento', 20)->nullable(false);
            $table->tinyinteger('metalizado')->nullable(false);
            $table->tinyinteger('caixa')->nullable(false);
            $table->tinyinteger('lotacao')->nullable(false);
            $table->tinyinteger('destacado')->nullable(false);
            $table->tinyinteger('portas')->nullable(false);
            $table->string('classe_veiculo', 10)->nullable(false);
            $table->string('tracao', 10)->nullable(false);
            $table->tinyinteger('garantia_stand')->nullable(false);
            $table->tinyinteger('nr_registos')->nullable(false);
            $table->tinyinteger('livro_revisoes')->nullable(false);
            $table->tinyinteger('seg_chave')->nullable(false);
            $table->tinyinteger('jantes_liga_leve')->nullable(false);
            $table->string('estofos', 10)->nullable(false);
            $table->tinyinteger('medida_jantes')->nullable(false);
            $table->tinyinteger('airbags')->nullable(false);
            $table->tinyinteger('ar_condicionado')->nullable(false);
            $table->tinyinteger('importado')->nullable(false);
            $table->tinyinteger('disponivel')->nullable(false);
            $table->string('fotos', 60)->nullable(false);
            $table->string('foto_perfil', 255)->nullable(false);
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
        Schema::dropIfExists('anuncios');
    }
}
