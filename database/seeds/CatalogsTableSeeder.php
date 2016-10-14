<?php

use Illuminate\Database\Seeder;

class CatalogsTableSeeder extends Seeder
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
						array('catalog_type_id'=>1,'descripcion'=>'SOLTERO(A)','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>1,'descripcion'=>'CASADO(A)','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>1,'descripcion'=>'DIVORCIADO(A)','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>1,'descripcion'=>'VIUDO(A)','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>1,'descripcion'=>'UNIÓN LIBRE','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						
						array('catalog_type_id'=>2,'descripcion'=>'PRIMARIA','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>2,'descripcion'=>'SECUNDARIA','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>2,'descripcion'=>'SUPERIOR','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>2,'descripcion'=>'NINGUNA','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						
						array('catalog_type_id'=>3,'descripcion'=>'CURSO','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>3,'descripcion'=>'SEMINARIO','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>3,'descripcion'=>'ASAMBLEA','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>3,'descripcion'=>'CURSO DE CERTIFICACIÓN','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>3,'descripcion'=>'CONGRESO','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						
						array('catalog_type_id'=>4,'descripcion'=>'PRESENCIAL','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>4,'descripcion'=>'SEMIPRESENCIAL','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>4,'descripcion'=>'A DISTANCIA','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>4,'descripcion'=>'ONLINE','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						
						array('catalog_type_id'=>5,'descripcion'=>'ESPAÑOL','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>5,'descripcion'=>'QUICHUA','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>5,'descripcion'=>'INGLÉS','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>5,'descripcion'=>'FRANCÉS','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>5,'descripcion'=>'ITALIANO','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>5,'descripcion'=>'ALEMAN','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>5,'descripcion'=>'MANDARÍN','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>5,'descripcion'=>'JAPONÉS','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						
						array('catalog_type_id'=>6,'descripcion'=>'NINGUNO','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>6,'descripcion'=>'BÁSICO','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>6,'descripcion'=>'INTERMEDIO','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>6,'descripcion'=>'AVANZADO','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>6,'descripcion'=>'NATIVO','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						
						array('catalog_type_id'=>7,'descripcion'=>'ESCRITO','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>7,'descripcion'=>'ORAL','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('catalog_type_id'=>7,'descripcion'=>'LEÍDO','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring())
					);
		DB::table('catalogs')->insert($data);
    }
}
