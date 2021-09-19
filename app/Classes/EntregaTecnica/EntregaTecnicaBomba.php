<?php

namespace App\Classes\EntregaTecnica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaTecnicaBomba extends Model
{
    protected $table = 'entrega_tecnica_bomba';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id_bomba', 'id_entrega_tecnica', 'quantidade', 'ligacao', 'marca', 'modelo', 'numero_estagio', 'rotor', 'opcionais'
    ];
}
