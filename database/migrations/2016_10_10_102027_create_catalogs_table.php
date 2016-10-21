<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('catalog_type_id')->unsigned();
			$table->integer('padre')->nullable();
			$table->string('descripcion',200);
			$table->string('estado',25)->default('ACTIVO');
            $table->timestamps();
			
			/*$table->foreign('catalog_type_id')->references('id')->on('catalog_types');
			$table->foreign('padre')->references('id')->on('catalogs');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogs');
    }
}
