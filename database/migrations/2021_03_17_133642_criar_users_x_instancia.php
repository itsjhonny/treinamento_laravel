<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarUsersXInstancia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users_x_instancia'))
        {
        Schema::create('users_x_instancia', function (Blueprint $table) {
            $table->bigIncrements('id_permissao');                             
            
        });   
    }  

        Schema::table('users_x_instancia', function (Blueprint $table) {          
                    
            $table->unsignedBigInteger('id_usuario');           
            $table->foreign('id_usuario')
          ->references('id')
          ->on('users');
      });

      Schema::table('users_x_instancia', function (Blueprint $table) {          
                    
        $table->unsignedBigInteger('id_instancia');           
        $table->foreign('id_instancia')
      ->references('id_instancia')
      ->on('instancia');
  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_x_instancia');
    }
}
