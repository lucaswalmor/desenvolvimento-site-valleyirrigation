<?php

namespace App\Classes\EntregaTecnica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaTecnicaBombaMotor extends Model
{
    protected $table = 'entrega_tecnica_bomba_motor';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id_entrega_tecnica', 'id_motor', 'id_bomba',  'tipo_motor', 'marca', 'modelo', 'potencia', 'rotacao', 'tensao', 'numero_serie',
        'lp_ln', 'classe_isolamento', 'corrente_nominal', 'fs', 'ip', 'rendimento', 'cos'
    ];
}
