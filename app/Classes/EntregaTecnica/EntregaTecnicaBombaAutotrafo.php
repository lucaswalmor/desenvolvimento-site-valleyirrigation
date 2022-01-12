<?php

namespace App\Classes\EntregaTecnica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaTecnicaBombaAutotrafo extends Model
{
    protected $table = 'entrega_tecnica_autotrafo';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id_autotrafo', 'id_entrega_tecnica', 'tap_entrada_elevacao', 'tap_saida_elevacao', 'potencia_elevacao',
        'protecao_elevacao', 'numero_serie_elevacao', 'gerador', 'potencia_rebaixamento', 'tap_entrada_rebaixamento', 
        'tap_saida_rebaixamento', 'corrente_disjuntor', 'numero_serie_rebaixamento', 'numero_serie_gerador',
        'gerador_marca', 'gerador_modelo', 'gerador_potencia', 'gerador_frequencia', 'gerador_tensao'
    ];
}
