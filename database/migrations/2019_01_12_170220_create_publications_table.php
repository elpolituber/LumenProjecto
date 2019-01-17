<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('publications', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('detalle');
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
           
	        //primary key foreing key user
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
