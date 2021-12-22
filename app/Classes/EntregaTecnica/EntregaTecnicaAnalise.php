<?php

namespace App\Classes\EntregaTecnica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaTecnicaAnalise extends Model
{
    protected $table = 'entrega_tecnica_analise';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id_analise', 'id_entrega_tecnica', 'versao', 'status', 'observacoes'
    ];
}
