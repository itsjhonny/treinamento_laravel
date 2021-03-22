<?php

use Illuminate\Database\Seeder;

class User_x_InstanciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('users_x_instancia')->insert([
            [
                
                'id_usuario' => '1',
                'id_instancia' => '1',
                              
            ],
            [
                
                'id_usuario' => '1',
                'id_instancia' => '2',
                              
            ],
            [
                
                'id_usuario' => '1',
                'id_instancia' => '3',
                              
            ],
            [
                
                'id_usuario' => '2',
                'id_instancia' => '2',
                              
            ],
            [
                
                'id_usuario' => '2',
                'id_instancia' => '3',
                              
            ],
            [
                
                'id_usuario' => '3',
                'id_instancia' => '3',
                              
            ],
        ]);
    }
}
