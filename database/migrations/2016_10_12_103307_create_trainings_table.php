<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            //$table->increments('id');
			$table->integer('person_id');
			$table->string('institucion',100);
			$table->string('descripcion',100);
			$table->string('numero_horas',10);
			$table->integer('catalog_id_modalidad');
			$table->integer('catalog_id_tipo_curso');
			$table->date('fecha_inicio')->nullable();
			$table->date('fecha_fin')->nullable();
			//$table->softDeletes();
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
        Schema::dropIfExists('trainings');
    }
}
