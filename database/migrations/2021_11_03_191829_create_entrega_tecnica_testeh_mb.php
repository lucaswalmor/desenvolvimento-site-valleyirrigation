<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregaTecnicaTestehMb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_tecnica_testeh_mb', function (Blueprint $table) {
            $table->bigInteger('id_entrega_tecnica')->foreing('id_entrega_tecnica')->references('id')->on('entrega_tecnica');
            $table->bigInteger('id_testeh_mb');
            $table->double('pressao_reg_fechado', 6,2)->nullable();
            $table->string('pressao_reg_fechado_img', 200)->nullable();
            $table->double('pressao_reg_aberto', 6,2)->nullable();
            $table->string('pressao_reg_aberto_img', 200)->nullable();
            $table->double('pressao_centro', 6,2)->nullable();
            $table->string('pressao_centro_img', 200)->nullable();
            $table->double('pressao_ult_torre', 6,2)->nullable();
            $table->string('pressao_ult_torre_img', 200)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->primary(['id_testeh_mb', 'id_entrega_tecnica'], 'key_entrega_tecnica_testeh_mb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega_tecnica_testeh_mb');
    }
}
