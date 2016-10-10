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
						array('descripcion'=>'Estados civiles','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('descripcion'=>'Nivel de Estudios','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
					);
		DB::table('catalog_types')->insert($data);
    }
}
