<?php

namespace App\Classes\EntregaTecnica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaTecnicaTelemetria extends Model
{
    protected $table = 'entrega_tecnica_telemetria';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id_telemetria', 'id_entrega_tecnica', 'aqua_tec_pro', 'aqua_tec_lite', 'commander_vp', 'icon_link', 'crop_link',
        'base_station3', 'estacao_metereologica_valley', 'field_commander'
    ];
}