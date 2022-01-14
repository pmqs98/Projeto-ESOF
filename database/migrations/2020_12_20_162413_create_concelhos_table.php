<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcelhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   

        if ( !Schema::hasTable('concelhos') ) {
            Schema::create('concelhos', function (Blueprint $table) {
                $table->string('nome',60)->primary();
                $table->string('distrito',60);
                $table->foreign('distrito')->references('nome')->on('distritos')->onDelete('cascade');
    
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
        Schema::dropIfExists('concelhos');
    }
}
