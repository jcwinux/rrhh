<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('id_document_type')->index();
			$table->string('num_identificacion',30)->unique();
			$table->string('nombre_1',30);
			$table->string('nombre_2',30)->nullable();
			$table->string('apellido_1',30);
			$table->string('apellido_2',30)->nullable();
			$table->date('fecha_ncto');
			$table->string('nacionalidad')->default('ECUATORIANO/A');
			$table->string('trato',30)->nullable();
			$table->boolean('sexo');
			
			$table->boolean('discapacidad')->nullable();
			$table->string('grupo_sanguineo',30)->nullable();
			
			$table->string('email_institucional',50)->nullable();
			$table->string('email_personal',50)->nullable();
			$table->string('telefono_convencional',30)->nullable();
			$table->string('telefono_celular',30)->nullable();
			$table->string('ciudad_residencia');
			$table->string('parroquia_residencia',100)->nullable();
			$table->string('calle_principal',100)->nullable();
			$table->string('calle_transversal',100)->nullable();
			$table->string('manzana',30)->nullable();
			$table->string('villa',30)->nullable();
			
			$table->string('username',50)->unique();
			$table->string('password',200);
			
			$table->string('estado',25)->default('ACTIVO');
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
        Schema::dropIfExists('people');
    }
}