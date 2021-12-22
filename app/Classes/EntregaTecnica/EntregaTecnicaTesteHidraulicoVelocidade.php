<?php

namespace App\Classes\EntregaTecnica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaTecnicaTesteHidraulicoVelocidade extends Model
{
    protected $table = 'entrega_tecnica_testeh_vut';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id_entrega_tecnica', 'id_testeh_vut', 'velocidade_ult_torre',  'leitura_horímetro', 'leitura_horímetro_img', 'valor_tempo'
    ];
}