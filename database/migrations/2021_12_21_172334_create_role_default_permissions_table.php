<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleDefaultPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_default_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('id_typeUser');
            $table->unsignedBigInteger('id_module');
            $table->string('options', 3);
            $table->string('permission', 1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_typeUser')->references('id')->on('type_user_permissions')->onDelete('cascade');
            $table->foreign('id_module')->references('id')->on('module_permissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_default_permissions');
    }
}
