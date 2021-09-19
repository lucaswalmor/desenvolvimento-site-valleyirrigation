<?php

namespace App\Classes\EntregaTecnica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntregaTecnica extends Model
{
    protected $table = 'entrega_tecnica';

    use SoftDeletes;
    protected $dates =  ['deleted_at'];
    protected $fillable = [
        'id', 'id_tecnico', 'id_fazenda', 'numero_pedido', 'numero_serie', 'modelo_equipamento', 'tipo_equipamento', 
        'tipo_equipamento_op1', 'tipo_equipamento_op2', 'altura_equipamento_nome', 'altura_equipamento_valor',
        'balanco_comprimento', 'painel', 'corrente_fusivel_nh500v', 'pneus', 'motorredutores', 'motorreduror_marca', 'parada_automatica',
        'barreira_seguranca', 'telemetria', 'injeferd', 'canhao_final_valvula', 'acessorios', 'data_entrega_tecnica',
        'fornecedor_motor', 'fornecedor_bomba', 'fornecedor_chave_partida', 'fornecedor_conjunto_succao', 'fornecedor_ligacao_pressao',
        'fornecedor_adutora', 'fornecedor_kit_aspersores', 'fornecedor_pivo_central', 'item_manual_montagem', 'item_listagem_aspersores', 
        'item_manual_bomba', 'item_manual_motor_diesel', 'item_manual_chave_partida_ss'
    ];
}
