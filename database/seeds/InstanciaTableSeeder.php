<?php

use Illuminate\Database\Seeder;

class InstanciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('instancia')->insert([
            [
                
                'nome_instancia' => 'instancia 1',
                              
            ],
            [
                'nome_instancia' => 'instancia 2',             
            ],
            [
                'nome_instancia' => 'instancia 3',              
            ]
        ]);
    }
}
