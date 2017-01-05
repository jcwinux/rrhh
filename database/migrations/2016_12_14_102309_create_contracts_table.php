<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('person_id');
			$table->integer('department_id');
			$table->integer('job_id');
			$table->integer('contract_type_id');			
			$table->integer('location_id');
			$table->integer('catalog_forma_pago_id');
			$table->boolean('es_supervisor');
			$table->integer('supervisor_id')->nullable();
			$table->date('inicio_contrato');
			$table->date('fin_contrato');
			$table->float('salario');
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
        Schema::dropIfExists('contracts');
    }
}
