<?php

namespace App\Classes\Sistema;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends model
{
    protected $table = 'country';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id', 'sistema_medida', 'unidade_medida', 'formato_data', 'formato_numero', 'idioma_padrao', 'code', 'phone_code'
    ];
}
