<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEntregaTecnicaBombaAutotrafo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_tecnica_autotrafo', function (Blueprint $table) {
            $table->bigInteger('id_entrega_tecnica')->foreing('id_entrega_tecnica')->references('id')->on('entrega_tecnica');
            $table->bigInteger('id_autotrafo');
            $table->double('potencia_elevacao', 6,2)->nullable();
            $table->double('tap_entrada_elevacao', 6,2)->nullable();
            $table->double('tap_saida_elevacao', 6,2)->nullable();
            $table->double('corrente_disjuntor', 6,2)->nullable();
            $table->string('numero_serie_elevacao', 30)->nullable();
            $table->double('potencia_rebaixamento', 6,2)->nullable();
            $table->double('tap_entrada_rebaixamento', 6,2)->nullable();
            $table->double('tap_saida_rebaixamento', 6,2)->nullable();
            $table->string('numero_serie_rebaixamento', 30)->nullable();
            $table->string('numero_serie_gerador', 30)->nullable();
            $table->string('gerador', 20)->nullable();
            $table->string('gerador_marca', 20)->nullable();
            $table->string('gerador_modelo', 20)->nullable();
            $table->double('gerador_potencia', 6,2)->nullable();
            $table->double('gerador_frequencia', 6,2)->nullable();
            $table->double('gerador_tensao', 6,2)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->primary(['id_entrega_tecnica', 'id_autotrafo'], 'key_entrega_tecnica_autotrafo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_entrega_tecnica_autotrafo');
    }
}
