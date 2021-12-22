<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTelemetria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_tecnica_telemetria', function (Blueprint $table) {
            $table->bigInteger('id_entrega_tecnica')->foreing('id_entrega_tecnica')->references('id')->on('entrega_tecnica');
            $table->bigInteger('id_telemetria');
            $table->tinyInteger('aqua_tec_pro')->nullable();
            $table->tinyInteger('aqua_tec_lite')->nullable();
            $table->tinyInteger('commander_vp')->nullable();
            $table->tinyInteger('icon_link')->nullable();
            $table->tinyInteger('crop_link')->nullable();
            $table->tinyInteger('base_station3')->nullable();
            $table->tinyInteger('estacao_metereologica_valley')->nullable();
            $table->tinyInteger('field_commander')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->primary(['id_entrega_tecnica', 'id_telemetria'], 'key_entrega_tecnica_telemetria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega_tecnica_telemetria');
    }
}
