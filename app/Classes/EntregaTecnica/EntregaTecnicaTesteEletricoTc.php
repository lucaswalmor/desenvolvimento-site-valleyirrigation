<?php

namespace App\Classes\EntregaTecnica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaTecnicaTesteEletricoTc extends Model
{
    protected $table = 'entrega_tecnica_testee_tc';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id_entrega_tecnica', 'id_testee_tc', 'tensao_rs_semcarga',  'tensao_rs_semcarga_img', 'tensao_st_semcarga', 'tensao_st_semcarga_img',
        'tensao_rt_semcarga', 'tensao_rt_semcarga_img', 'tensao_rs_comcarga', 'tensao_rs_comcarga_img', 'tensao_st_comcarga',
        'tensao_st_comcarga_img', 'tensao_rt_comcarga', 'tensao_rt_comcarga_img'
    ];
}