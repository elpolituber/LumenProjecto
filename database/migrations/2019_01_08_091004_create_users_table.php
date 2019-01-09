<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('nombre');
            $table->string('apellido');
	        $table->string('foto');	
            $table->string('usuario');
            $table->string('carrera');
            $table->string('email')->unique();
            $table->string('pasword');
            $table->timestamps();
        });

        Schema::create('publications', function (Blueprint $table) {
            $table->increments('id_publication');
            $table->string('detalle');           
	        //primary key foreing key user
	    });
        
        Schema::create('chats', function (Blueprint $table) {
            $table->increments('id_publication');
            $table->string('detalle');           
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('publications');
        Schema::dropIfExists('chats');
    
    }
}
