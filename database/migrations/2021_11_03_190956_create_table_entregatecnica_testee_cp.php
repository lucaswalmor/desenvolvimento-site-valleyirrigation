<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEntregatecnicaTesteeCp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_tecnica_testee_cp', function (Blueprint $table) {
            $table->bigInteger('id_entrega_tecnica')->foreing('id_entrega_tecnica')->references('id')->on('entrega_tecnica');
            $table->bigInteger('id_bomba')->foreing('id_bomba')->references('id_bomba')->on('entrega_tecnica_bomba');
            $table->bigInteger('id_motor')->foreing('id_motor')->references('id_motor')->on('entrega_tecnica_bomba_motor');
            $table->bigInteger('id_chave_partida');
            $table->double('tensao_rs_semcarga', 6,2)->nullable();
            $table->string('tensao_rs_semcarga_img', 200)->nullable();
            $table->double('tensao_st_semcarga', 6,2)->nullable();
            $table->string('tensao_st_semcarga_img', 200)->nullable();
            $table->double('tensao_rt_semcarga', 6,2)->nullable();
            $table->string('tensao_rt_semcarga_img', 200)->nullable();
            $table->double('tensao_rs_comcarga', 6,2)->nullable();
            $table->string('tensao_rs_comcarga_img', 200)->nullable();
            $table->double('tensao_st_comcarga', 6,2)->nullable();
            $table->string('tensao_st_comcarga_img', 200)->nullable();
            $table->double('tensao_rt_comcarga', 6,2)->nullable();
            $table->string('tensao_rt_comcarga_img', 200)->nullable();
            $table->double('corrente_rs_comcarga', 6,2)->nullable();
            $table->string('corrente_rs_comcarga_img', 200)->nullable();
            $table->double('corrente_st_comcarga', 6,2)->nullable();
            $table->string('corrente_st_comcarga_img', 200)->nullable();
            $table->double('corrente_rt_comcarga', 6,2)->nullable();
            $table->string('corrente_rt_comcarga_img', 200)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->primary(['id_entrega_tecnica', 'id_chave_partida', 'id_bomba', 'id_motor'], 'key_entrega_tecnica_testee_cp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega_tecnica_testee_cp');
    }
}
