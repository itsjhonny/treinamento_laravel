<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarReserva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('reserva'))
        {
        Schema::create('reserva', function (Blueprint $table) {
            $table->bigIncrements('id_reserva');            
            $table->string('nome_atividade');
            $table->string('nome_solicitante');
            $table->string('email');
            $table->string('telefone');
            $table->string('departamento');
            $table->string('descricao_atividade');
            $table->string('obs');        
            $table->string('status');        
            
        });
    }

    Schema::table('reserva', function (Blueprint $table) {
        $table->unsignedBigInteger('id_usuario');           
        $table->foreign('id_usuario')
      ->references('id')
      ->on('users');        
        
    });
    Schema::table('reserva', function (Blueprint $table) {
        $table->unsignedBigInteger('id_unidade');           
        $table->foreign('id_unidade')
      ->references('id_unidade')
      ->on('unidades');        
        
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva');
    }
}
