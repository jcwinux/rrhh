<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreviousJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_jobs', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('person_id');
			$table->string('empresa',100);
			$table->string('direccion',100);
			$table->string('cargo',100);
			$table->string('descripcion',300);
			$table->date('desde');
			$table->date('hasta');
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
        Schema::dropIfExists('previous_jobs');
    }
}
