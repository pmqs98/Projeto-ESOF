<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        if ( !Schema::hasTable('modelos') ) {
            Schema::enableForeignKeyConstraints();
            Schema::create('modelos', function (Blueprint $table) {
                
                $table->increments('id_modelo')->primary;
                $table->integer('id_marca')->unsigned();
                $table->string('nome');
                $table->foreign('id_marca')->references('id_marca')->on('marcas')->onDelete('cascade');
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
        Schema::dropIfExists('modelos');
    }
}
