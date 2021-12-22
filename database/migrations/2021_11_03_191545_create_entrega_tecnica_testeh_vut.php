<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregaTecnicaTestehVut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_tecnica_testeh_vut', function (Blueprint $table) {
            $table->bigInteger('id_entrega_tecnica')->foreing('id_entrega_tecnica')->references('id')->on('entrega_tecnica');
            $table->bigInteger('id_testeh_vut');
            $table->double('velocidade_ult_torre', 6,2)->nullable();
            $table->double('leitura_horímetro', 6,2)->nullable();
            $table->string('leitura_horímetro_img', 200)->nullable();
            $table->double('valor_tempo', 6,2)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->primary(['id_testeh_vut', 'id_entrega_tecnica'], 'key_entrega_tecnica_testeh_vut');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega_tecnica_testeh_vut');
    }
}
