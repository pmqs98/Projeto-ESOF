<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreguesiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   


        if ( !Schema::hasTable('freguesias') ) {
            Schema::create('freguesias', function (Blueprint $table) {
                $table->increments('id_freguesia')->primary;
                $table->string('nome');
                $table->string('concelho',60);
                $table->foreign('concelho')->references('nome')->on('concelhos')->onDelete('cascade');
                
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
        Schema::dropIfExists('frequesias');
    }
}
