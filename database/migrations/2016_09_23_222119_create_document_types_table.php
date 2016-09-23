<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_types', function (Blueprint $table) {
            $table->increments('id');
			$table->string('descripcion')->unique();
            $table->timestamps();
        });
		
		/*Agregando registros iniciales*/
		$data = array(array('descripcion'=>'Cédula'),
					  array('descripcion'=>'Pasaporte'));
		DB::table('document_types')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_types');
    }
}
