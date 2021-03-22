<?php

use Illuminate\Database\Seeder;

class Equipamentos_x_ReservaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipamentos_x_reserva')->insert([
            [
                
                'id_reserva' => '1',
                'id_equipamento' => '1',
                              
            ],
            [
                
                'id_reserva' => '1',
                'id_equipamento' => '2',
                              
            ],
            [
                
                'id_reserva' => '1',
                'id_equipamento' => '3',
                              
            ],
            [
                
                'id_reserva' => '2',
                'id_equipamento' => '4',
                              
            ],
            [
                
                'id_reserva' => '3',
                'id_equipamento' => '5',
                              
            ],
        ]);
    }
}
