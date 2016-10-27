<?php

use Illuminate\Database\Seeder;

class FormFunctionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array 
					(
						array('form_id'=>1,'nombre'=>'Guardar','descripcion'=>'Guarda la información ingresada en el formulario','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('form_id'=>2,'nombre'=>'Guardar','descripcion'=>'Modifica la información ingresada en el formulario','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring())
					);
		DB::table('form_functions')->insert($data);
    }
}
