<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_language', function (Blueprint $table) {
            $table->unsignedBigInteger('id_module');
            $table->unsignedBigInteger('id_language');
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_module')->references('id')->on('module_permissions')->onDelete('cascade');
            $table->foreign('id_language')->references('id')->on('language')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_language');
    }
}
