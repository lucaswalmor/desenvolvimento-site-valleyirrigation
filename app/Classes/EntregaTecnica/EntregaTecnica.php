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
        'id', 'id_tecnico', 'id_fazenda', 'tipo_entrega_tecnica', 'numero_pedido', 'numero_serie', 'modelo_equipamento', 'tipo_equipamento', 
        'tipo_equipamento_op1', 'tipo_equipamento_op2', 'altura_equipamento_nome', 'altura_equipamento_valor', 'quantidade_motobomba',
        'ligacao_serie', 'ligacao_paralelo', 'tipo_succao', 'succao_auxiliar', 'quantidade_motobomba_auxiliar',
        'balanco_comprimento', 'painel', 'corrente_fusivel_nh500v', 'pneus', 'parada_automatica', 'observacoes_gerais',
        'barreira_seguranca', 'telemetria', 'injeferd', 'canhao_final_valvula', 'acessorios', 'data_entrega_tecnica',
        'item_manual_montagem', 'item_listagem_aspersores', 'item_manual_bomba', 'item_manual_motor_diesel', 'item_manual_chave_partida_ss',
        'tubo_az1_comprimento', 'tubo_az1_diametro', 'tubo_az2_comprimento', 'tubo_az2_diametro', 'peca_aumento_diametro_maior', 
        'peca_aumento_diametro_menor', 'registro_gaveta_diametro', 'registro_gaveta_marca', 'valvula_retencao_diametro', 'valvula_retencao_marca',
        'valvula_retencao_material', 'valvula_ventosa_diametro', 'valvula_ventosa_marca', 'valvula_ventosa_modelo', 'valvula_antecondas_diametro',
        'valvula_antecondas_marca', 'valvula_antecondas_modelo', 'registro_eletrico_diametro', 'registro_eletrico_marca', 'registro_eletrico_modelo',
        'medicoes_ligpress_outros', 'tubo_acozinc1_comprimento', 'tubo_acozinc1_diametro', 'tubo_acozinc2_comprimento', 'tubo_acozinc2_diametro',
        'tubo_pvcpn60_comprimento', 'tubo_pvcpn60_diametro', 'tubo_pvcpn80_comprimento', 'tubo_pvcpn80_diametro', 'tubo_pvcpn125_comprimento',
        'tubo_pvcpn125_diametro', 'tubo_pvcpn145_comprimento', 'tubo_pvcpn145_diametro', 'tubo_pvcpn160_comprimento', 'tubo_pvcpn160_diametro',
        'tubo_pvcpn180_comprimento', 'tubo_pvcpn180_diametro', 'tubo_rpvc_comprimento', 'tipo_tubo_succao',
        'tubo_prfv_diametro', 'medicoes_observacoes', 'aspersor_marca', 'aspersor_modelo', 'aspersor_defletor', 'aspersor_impacto_marca',
        'aspersor_impacto_modelo', 'aspersor_regulador_marca', 'aspersor_regulador_modelo', 'aspersor_pressao', 'tubo_descida', 'trilha_seca',
        'aspersor_canhao_final', 'aspersor_canhao_final_bocal', 'aspersor_mbbooster_marca', 'aspersor_mbbooster_modelo', 
        'aspersor_mbbooster_rotor', 'aspersor_mbbooster_potencia', 'aspersor_mbbooster_corrente', 'medicao_succao_l', 'medicao_succao_h',
        'medicao_succao_e', 'medicao_succao_diametro', 'medicao_succao_tipo', 'tubo_acozinc1_quantidade', 'tubo_acozinc2_quantidade',
        'tubo_pvcpn60_quantidade', 'tubo_pvcpn80_quantidade', 'tubo_pvcpn125_quantidade', 'tubo_pvcpn145_quantidade', 'tubo_pvcpn160_quantidade',
        'tubo_pvcpn180_quantidade', 'tubo_prfv_quantidade', 'status_parte_aerea', 'status_lances', 'status_aspersores', 'status_adutora', 'status_ligacao',
        'status_motobomba', 'status_succao', 'status_autotrafo', 'status_testes', 'status_telemetria', 'data_envio_entrega_tecnica', 'observacoes_envio',
        'img_declaracao'
    ];
}
