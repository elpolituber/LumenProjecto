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
            $table->increments('user_id');
            $table->string('nombre');
            $table->string('apellido');
	        $table->string('foto');	
            $table->string('usuario');
            $table->string('carrera');
            $table->string('email')->unique();
            $table->string('pasword');
            $table->timestamps();
        });
        
        
   /*     Schema::create('friends', function (Blueprint $table) {
            $table->increments('id_frinds');
            $table->string('id_user_id')->unsigned();           
	        $table->string('id_user_id')->unsigned();           
            $table->timestamps();           
	        //primary key foreing key user	
	    });
     */   
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
