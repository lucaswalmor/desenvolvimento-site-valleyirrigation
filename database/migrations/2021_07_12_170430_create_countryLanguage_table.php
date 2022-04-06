<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_language', function (Blueprint $table) {
            $table->unsignedBigInteger('id_country')->foreign('id_country')->references('id')->on('country');
            $table->unsignedBigInteger('id_language')->foreign('id_language')->references('id')->on('language');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();

            $table->primary(['id_country', 'id_language']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_language');
    }
}
