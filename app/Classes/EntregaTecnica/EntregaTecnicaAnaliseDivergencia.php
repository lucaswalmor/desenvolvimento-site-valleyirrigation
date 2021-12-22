<?php

namespace App\Classes\EntregaTecnica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaTecnicaAnaliseDivergencia extends Model
{
    protected $table = 'entrega_tecnica_analise_divergencia';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id_analise_divergencia', 'id_entrega_tecnica', 'versao', 'divergencia', 'campo'
    ];
}
