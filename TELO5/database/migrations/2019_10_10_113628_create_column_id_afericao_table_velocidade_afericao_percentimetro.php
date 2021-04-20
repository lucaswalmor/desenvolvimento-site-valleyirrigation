<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnIdAfericaoTableVelocidadeAfericaoPercentimetro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('velocidade_afericao_percentimetro', function (Blueprint $table) {
            $table->unsignedBigInteger('id_afericao')->foreign()->references('id')->on('afericoes_pivos_centrais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('velocidade_afericao_percentimetro', function($table) {
            $table->dropColumn('id_afericao');
        });
    }
}
