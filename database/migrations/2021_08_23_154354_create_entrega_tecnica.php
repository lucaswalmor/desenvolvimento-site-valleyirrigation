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
            $table->date('data_entrega_tecnica')->nullable();
            $table->string('numero_pedido', 10)->nullable();
            $table->string('numero_serie', 20)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('etapa_edicao')->default(1);
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
            $table->string('motorredutores')->nullable();
            $table->string('motorreduror_marca', 30)->nullable();
            $table->tinyInteger('parada_automatica')->default(0);
            $table->tinyInteger('barreira_seguranca')->default(0);
            $table->string('telemetria', 50)->nullable();
            $table->string('acessorios', 100)->nullable();
            $table->string('injeferd', 10)->nullable();
            $table->string('canhao_final_valvula', 20)->nullable();
            $table->string('fornecedor_motor', 20)->nullable();
            $table->string('fornecedor_bomba', 20)->nullable();
            $table->string('fornecedor_chave_partida', 20)->nullable();
            $table->string('fornecedor_conjunto_succao', 20)->nullable();
            $table->string('fornecedor_ligacao_pressao', 20)->nullable();
            $table->string('fornecedor_adutora', 20)->nullable();
            $table->string('fornecedor_kit_aspersores', 20)->nullable();
            $table->string('fornecedor_pivo_central', 20)->nullable();
            $table->tinyInteger('item_manual_montagem')->nullable();
            $table->tinyInteger('item_listagem_aspersores')->nullable();
            $table->tinyInteger('item_manual_bomba')->nullable();
            $table->tinyInteger('item_manual_motor_diesel')->nullable();
            $table->tinyInteger('item_manual_chave_partida_ss')->nullable();
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
