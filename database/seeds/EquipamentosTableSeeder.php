<?php

use Illuminate\Database\Seeder;

class EquipamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipamentos')->insert([
            [
                
                'nome_equipamento' => 'equipamento 1',
                              
            ],
            [
                'nome_equipameto' => 'equipamento 2',             
            ],
            [
                'nome_equipamento' => 'equipamento 3',              
            ],
            [
                'nome_equipamento' => 'equipamento 4',              
            ],
            [
                'nome_equipamento' => 'equipamento 5',              
            ],
            [
                'nome_equipamento' => 'equipamento 6',              
            ]
        ]);
    }
}
