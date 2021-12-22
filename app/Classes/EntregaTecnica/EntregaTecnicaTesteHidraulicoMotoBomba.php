<?php

namespace App\Classes\EntregaTecnica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaTecnicaTesteHidraulicoMotoBomba extends Model
{
    protected $table = 'entrega_tecnica_testeh_mb';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id_entrega_tecnica', 'id_testeh_mb', 'pressao_reg_fechado',  'pressao_reg_fechado_img', 'pressao_reg_aberto', 'pressao_reg_aberto_img',
        'pressao_centro', 'pressao_centro_img', 'pressao_ult_torre', 'pressao_ult_torre_img'
    ];
}