<?php

namespace App\Classes\EntregaTecnica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaTecnicaChavePartida extends Model
{
    protected $table = 'entrega_tecnica_chave_partida';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id_chave_partida', 'id_entrega_tecnica', 'marca', 'acionamento', 'regulagem_reles', 'numero_serie', 'id_bomba', 'id_motor'
    ];
}
