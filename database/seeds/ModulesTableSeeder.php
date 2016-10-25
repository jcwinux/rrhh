<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
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
						array('nombre'=>'CONFIGURACIONES','descripcion'=>'Permite realizar las configuraciones al sistema','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'RECLUTAMIENTO','descripcion'=>'Permite hacer la toma de datos de candidatos a puestos de trabajo','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'PERSONAL','descripcion'=>'Permite ingresar los datos de un empleado','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'HORARIOS','descripcion'=>'Permite creación de horarios de trabajos','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'BENEFICIOS','descripcion'=>'Permite el ingreso de los beneficios que perciben los empleados','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('nombre'=>'NÓMINA','descripcion'=>'Permite la generación de los roles de pagos y planillas del servicio de seguridad social','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring())
					);
		DB::table('modules')->insert($data);
    }
}
