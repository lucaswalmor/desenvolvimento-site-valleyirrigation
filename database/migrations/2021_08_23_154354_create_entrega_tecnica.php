<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregaTecnica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_tecnica', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_tecnico')->foreing('id_tecnico')->references('id')->on('users');
            $table->bigInteger('id_fazenda')->foreign('id_fazenda')->references('id')->on('fazendas');
            $table->date('data_entrega_tecnica');
            $table->string('tipo_entrega_tecnica', 10);
            $table->string('numero_pedido', 10);
            $table->string('numero_serie', 20)->nullable();
            $table->integer('quantidade_motobomba')->nullable();
            $table->integer('ligacao_serie')->nullable();
            $table->integer('ligacao_paralelo')->nullable();
            $table->string('tipo_succao', 10)->nullable();
            $table->string('succao_auxiliar', 10)->nullable();
            $table->integer('quantidade_motobomba_auxiliar')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('modelo_equipamento')->nullable();
            $table->string('tipo_equipamento')->nullable();
            $table->string('tipo_equipamento_op1')->nullable();
            $table->string('tipo_equipamento_op2')->nullable();
            $table->string('altura_equipamento_nome')->nullable();
            $table->double('altura_equipamento_valor', 6,2)->nullable();
            $table->string('balanco_comprimento')->nullable();
            $table->string('painel')->nullable();
            $table->string('corrente_fusivel_nh500v')->nullable();
            $table->string('pneus')->nullable();
            $table->tinyInteger('parada_automatica')->nullable();
            $table->tinyInteger('barreira_seguranca')->nullable();
            $table->string('telemetria', 50)->nullable();
            $table->string('acessorios', 100)->nullable();
            $table->string('injeferd', 10)->nullable();
            $table->string('canhao_final_valvula', 20)->nullable();
            $table->double('tubo_az1_comprimento', 6,2)->nullable();
            $table->double('tubo_az1_diametro', 6,2)->nullable();
            $table->double('tubo_az2_comprimento', 6,2)->nullable();
            $table->double('tubo_az2_diametro', 6,2)->nullable();
            $table->double('peca_aumento_diametro_maior', 6,2)->nullable();
            $table->double('peca_aumento_diametro_menor', 6,2)->nullable();
            $table->double('registro_gaveta_diametro', 6,2)->nullable();
            $table->string('registro_gaveta_marca', 50)->nullable();
            $table->double('valvula_retencao_diametro', 6,2)->nullable();
            $table->string('valvula_retencao_marca', 50)->nullable();
            $table->string('valvula_retencao_material', 50)->nullable();
            $table->double('valvula_ventosa_diametro', 6,2)->nullable();
            $table->string('valvula_ventosa_marca', 50)->nullable();
            $table->string('valvula_ventosa_modelo', 50)->nullable();
            $table->integer('quantidade_valv_ventosa')->nullable();
            $table->double('valvula_antecondas_diametro', 6,2)->nullable();
            $table->string('valvula_antecondas_marca', 50)->nullable();
            $table->string('valvula_antecondas_modelo', 50)->nullable();
            $table->double('registro_eletrico_diametro', 6,2)->nullable();
            $table->string('registro_eletrico_marca', 50)->nullable();
            $table->string('registro_eletrico_modelo', 50)->nullable();
            $table->string('medicoes_ligpress_outros', 100)->nullable();
            $table->double('medicao_succao_l', 6,2)->nullable();
            $table->double('medicao_succao_h', 6,2)->nullable();
            $table->double('medicao_succao_e', 6,2)->nullable();
            $table->double('medicao_succao_diametro', 6,2)->nullable();
            $table->string('medicao_succao_tipo', 30)->nullable();
            $table->string('tipo_tubo_succao', 255)->nullable();
            $table->integer('giro')->nullable();
            $table->string('aspersor_marca', 30)->nullable();
            $table->string('aspersor_modelo', 30)->nullable();
            $table->string('aspersor_defletor', 30)->nullable();
            $table->string('aspersor_impacto_marca', 30)->nullable();
            $table->string('aspersor_impacto_modelo', 30)->nullable();
            $table->string('aspersor_regulador_marca', 30)->nullable();
            $table->string('aspersor_regulador_modelo', 30)->nullable();
            $table->string('aspersor_pressao', 30)->nullable();
            $table->string('aspersor_canhao_final', 30)->nullable();
            $table->double('aspersor_canhao_final_bocal', 6,2)->nullable();
            $table->string('aspersor_mbbooster_marca', 30)->nullable();
            $table->string('aspersor_mbbooster_modelo', 30)->nullable();
            $table->string('aspersor_mbbooster_rotor', 6,2)->nullable();
            $table->string('aspersor_mbbooster_potencia', 6,2)->nullable();
            $table->string('aspersor_mbbooster_corrente', 6,2)->nullable();
            $table->string('tubo_descida')->nullable();
            $table->integer('trilha_seca')->default(0);
            $table->integer('status_parte_aerea')->default(0);
            $table->integer('status_lances')->default(0);
            $table->integer('status_aspersores')->default(0);
            $table->integer('status_adutora')->default(0);
            $table->integer('status_ligacao')->default(0);
            $table->integer('status_motobomba')->default(0);
            $table->integer('status_succao')->default(0);
            $table->integer('status_autotrafo')->default(0);
            $table->integer('status_testes')->default(0);
            $table->integer('status_telemetria')->default(0);
            $table->text('observacoes_gerais')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega_tecnica');
    }
}
