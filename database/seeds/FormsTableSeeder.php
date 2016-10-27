<?php

use Illuminate\Database\Seeder;

class FormsTableSeeder extends Seeder
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
						array('module_id'=>1,'nombre'=>'Ingresar persona','descripcion'=>'Permite la toma de datos para una persona que no existe en el sistema','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('module_id'=>1,'nombre'=>'Editar persona','descripcion'=>'Permite la toma de datos para una persona que no existe en el sistema','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring())
					);
		DB::table('forms')->insert($data);
    }
}
