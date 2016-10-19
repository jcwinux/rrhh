<?php

use Illuminate\Database\Seeder;

class CatalogTypesTableSeeder extends Seeder
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
						array('descripcion'=>'Estados civiles','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),//1
						array('descripcion'=>'Nivel de estudios','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),//2
						array('descripcion'=>'Tipos de capacitaciones','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),//3
						array('descripcion'=>'Modalidad de capacitaciones','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),//4
						array('descripcion'=>'Idiomas','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),//5
						array('descripcion'=>'Nivel dominio','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),//6
						array('descripcion'=>'Habilidad/Ámbito de un idioma','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),//7
						array('descripcion'=>'Discapacidades','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),//8
						array('descripcion'=>'Grado de discapacidad','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring())//9
					);
		DB::table('catalog_types')->insert($data);
    }
}
