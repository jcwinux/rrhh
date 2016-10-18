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
			$table->integer('document_type_id')->unsigned();
			$table->string('num_identificacion',30)->unique();
			$table->string('nombre_1',30);
			$table->string('nombre_2',30)->nullable();
			$table->string('apellido_1',30);
			$table->string('apellido_2',30)->nullable();
			$table->date('fecha_ncto');
			$table->integer('catalog_id_estado_civil')->unsigned();
			$table->string('nacionalidad',50)->default('ECUATORIANO');
			$table->string('trato',30);
			$table->boolean('sexo');
			$table->boolean('discapacidad')->nullable();
			$table->string('grupo_sanguineo',30)->nullable();
			$table->string('email_institucional',50)->nullable();
			$table->string('email_personal',50)->nullable();
			$table->string('telefono_convencional',30)->nullable();
			$table->string('telefono_celular',30)->nullable();
			$table->integer('province_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->integer('town_id')->unsigned();
			$table->string('calle_principal',100)->nullable();
			$table->string('calle_transversal',100)->nullable();
			$table->string('manzana',30)->nullable();
			$table->string('villa',30)->nullable();
			$table->string('username',50)->unique();
			$table->string('password',255);
			$table->string('remember_token',100)->nullable();
			$table->string('estado',25)->default('ACTIVO');
			
			/*Foreign keys*/
			/*$table->foreign('document_type_id')->references('id')->on('document_types');
			$table->foreign('province_id')->references('id')->on('provinces');
			$table->foreign('city_id')->references('id')->on('cities');
			$table->foreign('town_id')->references('id')->on('towns');*/
			
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