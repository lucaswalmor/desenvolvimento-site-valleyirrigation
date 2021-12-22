<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAspersoresET extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_tecnica_aspersores', function (Blueprint $table) {
            $table->bigInteger('id_entrega_tecnica')->foreing('id_entrega_tecnica')->references('id')->on('entrega_tecnica');
            $table->bigInteger('id_aspersor');
            $table->string('marca', 30);
            $table->string('modelo', 30);
            $table->string('defletor', 20);
            $table->string('impacto_marca', 30);
            $table->string('impacto_modelo', 30);
            $table->string('regulador_marca', 30);
            $table->string('regulador_modelo', 60);
            $table->string('pressao', 20);
            $table->string('opcionais', 30);
            $table->string('canhao_final', 30);
            $table->double('canhao_final_bocal', 6,2);
            $table->string('mb_booster_marca', 30);
            $table->string('mb_booster_modelo', 30);
            $table->double('mb_booster_rotor', 6,2);
            $table->double('mb_booster_potencia', 6,2);
            $table->double('mb_booster_corrente', 6,2);
            $table->softDeletes();
            $table->timestamps();
            $table->primary(['id_entrega_tecnica', 'id_aspersor'], 'key_entrega_tecnica_aspersores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega_tecnica_aspersores');
    }
}
