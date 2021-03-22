<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(UsersTableSeeder::class);
       $this->call(InstanciaTableSeeder::class);
       $this->call(User_x_InstanciaTableSeeder::class);
       $this->call(UnidadesTableSeeder::class);
       $this->call(ReservaTableSeeder::class);
       $this->call(PeriodoTableSeeder::class);
       $this->call(EquipamentosTableSeeder::class);
       $this->call(Equipamentos_x_ReservaTableSeeder::class);
      
       
       
       
    }
}
