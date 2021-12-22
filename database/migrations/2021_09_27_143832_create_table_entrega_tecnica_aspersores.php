<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEntregaTecnicaAspersores extends Migration
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
            $table->bigIncrements('id_aspersor');
            $table->string('marca', 30)->nullable();
            $table->string('modelo', 30)->nullable();
            $table->string('defletor', 20)->nullable();
            $table->string('impacto_marca', 30)->nullable();
            $table->string('impacto_modelo', 30)->nullable();
            $table->string('regulador_marca', 30)->nullable();
            $table->string('regulador_modelo', 60)->nullable();
            $table->string('pressao', 20)->nullable();
            $table->string('opcionais', 30)->nullable();
            $table->string('canhao_final', 30)->nullable();
            $table->double('canhao_final_bocal', 6,2)->nullable();
            $table->string('mb_booster_marca', 30)->nullable();
            $table->string('mb_booster_modelo', 30)->nullable();
            $table->double('mb_booster_rotor', 6,2)->nullable();
            $table->double('mb_booster_potencia', 6,2)->nullable();
            $table->double('mb_booster_corrente', 6,2)->nullable();
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
        Schema::dropIfExists('entrega_tecnica_aspersores');
    }
}
