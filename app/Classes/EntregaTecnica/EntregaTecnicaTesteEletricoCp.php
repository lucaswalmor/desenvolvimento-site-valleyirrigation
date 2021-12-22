<?php

namespace App\Classes\EntregaTecnica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaTecnicaTesteEletricoCp extends Model
{
    protected $table = 'entrega_tecnica_testee_cp';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id_entrega_tecnica', 'id_bomba', 'id_motor', 'id_chave_partida', 'tensao_rs_semcarga',  'tensao_rs_semcarga_img', 'tensao_st_semcarga', 'tensao_st_semcarga_img',
        'tensao_rt_semcarga', 'tensao_rt_semcarga_img', 'tensao_rs_comcarga', 'tensao_rs_comcarga_img', 'tensao_st_comcarga',
        'tensao_st_comcarga_img', 'tensao_rt_comcarga', 'tensao_rt_comcarga_img', 'corrente_rs_comcarga', 'corrente_rs_comcarga_img',
        'corrente_st_comcarga', 'corrente_st_comcarga_img', 'corrente_rt_comcarga', 'corrente_rt_comcarga_img'
    ];
}