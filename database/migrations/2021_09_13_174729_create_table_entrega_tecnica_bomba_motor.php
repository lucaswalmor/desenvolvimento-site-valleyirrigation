<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEntregaTecnicaBombaMotor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_tecnica_bomba_motor', function (Blueprint $table) {
            $table->bigInteger('id_entrega_tecnica')->foreing('id_entrega_tecnica')->references('id')->on('entrega_tecnica_bomba');
            $table->bigInteger('id_bomba')->foreing('id_bomba')->references('id')->on('entrega_tecnica_bomba');
            $table->bigInteger('id_motor');
            $table->string('tipo_motor', 10)->nullable();
            $table->string('marca', 30)->nullable();
            $table->string('modelo', 30)->nullable();
            $table->double('potencia', 6,2)->nullable();
            $table->double('rotacao', 6,2)->nullable();
            $table->double('tensao', 6,2)->nullable();
            $table->string('numero_serie', 20)->nullable();
            $table->double('lp_ln', 6,2)->nullable();
            $table->string('classe_isolamento', 5)->nullable();
            $table->double('corrente_nominal', 6,2)->nullable();
            $table->double('fs', 6,2)->nullable();
            $table->double('ip', 6,2)->nullable();
            $table->double('rendimento', 6,2)->nullable();
            $table->double('cos', 6,2)->nullable();
            $table->string('plaqueta_img', 200)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->primary(['id_entrega_tecnica', 'id_bomba', 'id_motor'], 'key_entrega_tecnica_bomba_motor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_entrega_tecnica_bomba_motor');
    }
}
