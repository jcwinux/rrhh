<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
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
						array('nombre'=>'AZUAY','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'BOLIVAR','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'CAÑAR','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'CARCHI','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'COTOPAXI','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'CHIMBORAZO','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'EL ORO','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'ESMERALDAS','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'GUAYAS','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'IMBABURA','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'LOJA','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'LOS RIOS','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'MANABI','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'MORONA SANTIAGO','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'NAPO','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'PASTAZA','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'PICHINCHA','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'TUNGURAHUA','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'ZAMORA CHINCHIPE','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'GALAPAGOS','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'SUCUMBIOS','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'ORELLANA','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'SANTO DOMINGO DE LOS TSACHILAS','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'SANTA ELENA','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring())

					);
		DB::table('provinces')->insert($data);
    }
}
