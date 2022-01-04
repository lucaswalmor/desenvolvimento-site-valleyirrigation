<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEntregaTecnicaAdutora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega_tecnica_adutora', function (Blueprint $table) {
            $table->bigInteger('id_entrega_tecnica')->foreing('id_entrega_tecnica')->references('id')->on('entrega_tecnica');
            $table->bigInteger('id_adutora');
            $table->string('marca_tubo', 30)->nullable();
            $table->string('fornecedor', 30)->nullable();
            $table->string('tipo_tubo', 30)->nullable();
            $table->double('diametro', 6,2)->nullable();
            $table->integer('numero_linha')->nullable();
            $table->integer('quantidade')->nullable();
            $table->double('comprimento', 6,2)->nullable();            
            $table->softDeletes();
            $table->timestamps();
            $table->primary(['id_entrega_tecnica', 'id_adutora'], 'key_entrega_tecnica_adutora');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_entrega_tecnica_adutora');
    }
}
