<?php

namespace App\Classes\EntregaTecnica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaTecnicaAdutora extends Model
{
    protected $table = 'entrega_tecnica_adutora';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id_adutora', 'id_entrega_tecnica', 'tipo_tubo', 'diametro', 'numero_linha', 'quantidade', 'comprimento',
        'motorredutor_alto_quantidade', 'motorredutor_baixo_quantidade', 'marca_tubo', 'fornecedor'
    ];
}