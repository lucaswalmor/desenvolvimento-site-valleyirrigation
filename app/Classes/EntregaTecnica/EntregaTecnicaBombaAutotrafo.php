<?php

namespace App\Classes\EntregaTecnica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaTecnicaBombaAutotrafo extends Model
{
    protected $table = 'entrega_tecnica_bomba_autotrafo';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id_autotrafo', 'id_entrega_tecnica', 'potencia', 'tap_entrada', 'tap_saida', 'chave_seccionadora', 'numero_serie', 'gerador', 
        'gerador_marca', 'gerador_modelo', 'gerador_potencia', 'gerador_frequencia', 'gerador_tensao'
    ];
}
