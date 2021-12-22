<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregatecnicaTesteeTc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_tecnica_testee_tc', function (Blueprint $table) {
            $table->bigInteger('id_entrega_tecnica')->foreing('id_entrega_tecnica')->references('id')->on('entrega_tecnica');
            $table->bigInteger('id_testee_tc');
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
            $table->softDeletes();
            $table->timestamps();
            $table->primary(['id_testee_tc', 'id_entrega_tecnica'], 'key_entrega_tecnica_testee_tc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega_tecnica_testee_tc');
    }
}
