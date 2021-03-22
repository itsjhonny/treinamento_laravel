<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarEquipamentosXReserva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('equipamentos_x_reserva'))
        {
        Schema::create('equipamentos_x_reserva', function (Blueprint $table) {
            $table->bigIncrements('id_equipa');                   
            
        });
     }

     Schema::table('equipamentos_x_reserva', function (Blueprint $table) {          
                    
        $table->unsignedBigInteger('id_reserva');           
        $table->foreign('id_reserva')
      ->references('id_reserva')
      ->on('reserva');
  });

  Schema::table('equipamentos_x_reserva', function (Blueprint $table) {          
                    
    $table->unsignedBigInteger('id_equipamento');           
    $table->foreign('id_equipamento')
  ->references('id_equipamento')
  ->on('equipamentos');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipamentos_x_reserva');
    }
}
