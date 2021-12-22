<?php

namespace App\Classes\EntregaTecnica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaTecnicaLances extends Model
{
    protected $table = 'entrega_tecnica_lances';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id_entrega_tecnica', 'id_lance', 'diametro_tubo',  'quantidade_tubo', 
        'comprimento_lance', 'motorredutor_potencia', 'motorredutor_marca', 'numero_serie'
    ];
}
