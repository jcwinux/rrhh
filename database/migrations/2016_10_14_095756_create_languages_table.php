<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            //$table->increments('id');
			$table->integer('person_id');
			$table->integer('catalog_id_idioma');
			$table->integer('catalog_id_dominio_escrito');
			$table->integer('catalog_id_dominio_leido');
			$table->integer('catalog_id_dominio_oral');
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
        Schema::dropIfExists('languages');
    }
}
