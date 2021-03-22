<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarPeriodo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('periodo'))
        {
        Schema::create('periodo', function (Blueprint $table) {
            $table->bigIncrements('id_periodo');            
            $table->dateTime('data_inicial',$precision = 0);
            $table->dateTime('data_final',$precision = 0);          
           /* $table->boolean('hora_0');
            $table->boolean('hora_1');
            $table->boolean('hora_2');
            $table->boolean('hora_3');
            $table->boolean('hora_4');
            $table->boolean('hora_5');
            $table->boolean('hora_6');
            $table->boolean('hora_7');
            $table->boolean('hora_8');
            $table->boolean('hora_9');
            $table->boolean('hora_10');
            $table->boolean('hora_11');
            $table->boolean('hora_12');
            $table->boolean('hora_13');
            $table->boolean('hora_14');
            $table->boolean('hora_15');
            $table->boolean('hora_16');
            $table->boolean('hora_17');
            $table->boolean('hora_18');
            $table->boolean('hora_19');
            $table->boolean('hora_20');
            $table->boolean('hora_21');
            $table->boolean('hora_22');
            $table->boolean('hora_23');   
            */       
            
        });
        Schema::table('periodo', function (Blueprint $table) {          
                    
            $table->unsignedBigInteger('id_reserva');           
            $table->foreign('id_reserva')
          ->references('id_reserva')
          ->on('reserva');
      });

      Schema::table('periodo', function (Blueprint $table) {          
                    
        $table->unsignedBigInteger('id_instancia');           
        $table->foreign('id_instancia')
      ->references('id_instancia')
      ->on('instancia');
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
        Schema::dropIfExists('periodo');
    }
}
