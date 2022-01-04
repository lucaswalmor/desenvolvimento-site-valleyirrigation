<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFazendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fazendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('cidade');
            $table->string('estado');
            $table->string('pais');
            $table->double('latitude', 12,8)->nullable();
            $table->double('longitude', 12,8)->nullable();
            $table->float('altitude');
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
        Schema::dropIfExists('fazendas');
    }
}
