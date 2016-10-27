<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesRolesFormsFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules_roles_forms_functions', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('module_role_form_id');
			$table->integer('form_function_id');
			$table->string('estado',25)->default('INACTIVO');
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
        Schema::dropIfExists('modules_roles_forms_functions');
    }
}
