<?php

use Illuminate\Database\Seeder;

class PeriodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodo')->insert([
            [
                
                
                'data_inicial' => '2020-01-02 00:00:00',
                'data_final' => '2020-01-02 18:00:00',
                'id_instancia' => '1',
                'id_reserva' => '1',                              
            ],
            [
                
                
                'data_inicial' => '2020-01-03 00:00:00',
                'data_final' => '2020-01-03 17:00:00',
                'id_instancia' => '1',
                'id_reserva' => '2',                              
            ],
            [
                
                
                'data_inicial' => '2020-01-04 00:00:00',
                'data_final' => '2020-01-04 23:00:00',
                'id_instancia' => '2',
                'id_reserva' => '3',                              
            ],
            [
                
                
                'data_inicial' => '2020-01-05 00:00:00',
                'data_final' => '2020-01-05 13:00:00',
                'id_instancia' => '3',
                'id_reserva' => '4',                              
            ],
            [
                
                
                'data_inicial' => '2020-01-01 12:00:00',
                'data_final' => '2020-01-01 18:00:00',
                'id_instancia' => '3',
                'id_reserva' => '5',                              
            ],

    
        ]);
     }

}
