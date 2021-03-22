<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
       // Determina o nome da tabela
       protected $table = 'unidades';

       // Define os campos protegidos
       protected $fillables = ['nome_unidade', 'sigla_unidade'];
   
       // Ligação de unidades a reserva
       public function reserva()
       {
           return $this->hasMany(Reserva::class);
       }
}
