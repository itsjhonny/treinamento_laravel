<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    public $timestamps = false;
    protected $table = 'reserva';

    protected $fillable = ['nome_atividade','nome_solicitante', 'email', 'telefone',
    'departamento', 'descricao_atividade', 'obs', 'status', 'id_unidade', 'id_usuario'];

    // Ligação da tabela reserva -> unidades
    public function unidades()
    {
        return $this->belongsTo(Unidade::class, 'id_unidade');
    }

    // Ligação da tabela reserva -> usuarios
    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
