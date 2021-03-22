<?php

use Illuminate\Database\Seeder;

class UnidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('unidades')->insert([
            [
                
                
                'nome_unidade' => 'ICICT',
                'sigla_unidade' => 'ICICT',
                              
            ],
            [
                
                'nome_unidade' => 'Presidência',
                'sigla_unidade' => 'PRE',
                              
            ],
            [
                
                'nome_unidade' => 'ENSP',
                'sigla_unidade' => 'ENSP',
                              
            ],
            [
                
                'nome_unidade' => 'INI',
                'sigla_unidade' => 'INI',
                              
            ],
            [
                
                'nome_unidade' => 'IOC',
                'sigla_unidade' => 'IOC',
                              
            ],
            [
                
                'nome_unidade' => 'COC',
                'sigla_unidade'=> 'COC',
                              
            ],
        ]);
    }
}
