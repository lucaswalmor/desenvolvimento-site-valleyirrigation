<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEntregaTecnicaChavePartida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_tecnica_chave_partida', function (Blueprint $table) {
            $table->bigInteger('id_entrega_tecnica')->foreing('id_entrega_tecnica')->references('id')->on('entrega_tecnica');
            $table->bigInteger('id_bomba')->foreing('id_bomba')->references('id_bomba')->on('entrega_tecnica_bomba');
            $table->bigInteger('id_motor')->foreing('id_motor')->references('id_motor')->on('entrega_tecnica_bomba_motor');
            $table->bigInteger('id_chave_partida');
            $table->string('marca', 30)->nullable();
            $table->string('acionamento', 30)->nullable();
            $table->double('regulagem_reles', 6,2)->nullable();
            $table->string('numero_serie', 20)->nullable();
            $table->tinyInteger('drive_connect')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->primary(['id_entrega_tecnica', 'id_chave_partida', 'id_bomba', 'id_motor'], 'key_entrega_tecnica_chave_partida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_entrega_tecnica_chave_partida');
    }
}
