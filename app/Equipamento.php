<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'id_equipamento';

    protected $fillable = [
   
        'id_equipamento',
        'nome_equipamento'

       ];
}
