<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregaTecnicaLances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_tecnica_lances', function (Blueprint $table) {
            $table->bigInteger('id_entrega_tecnica')->foreing('id_entrega_tecnica')->references('id')->on('entrega_tecnica');
            $table->bigInteger('id_lance');
            $table->string('diametro_tubo', 10)->nullable();
            $table->integer('quantidade_tubo')->nullable();
            $table->integer('numero_serie')->nullable();
            $table->double('comprimento_lance', 5,2)->nullable();
            $table->string('motorredutor_marca', 30)->nullable();
            $table->string('motorredutor_potencia')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->primary(['id_entrega_tecnica', 'id_lance']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega_tecnica_lances');
    }
}
