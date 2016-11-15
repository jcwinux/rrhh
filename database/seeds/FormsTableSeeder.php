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
						array('module_id'=>1,'nombre'=>'Usuarios','descripcion'=>'Permite consulta, ingreso, modificación y desactivación de usuarios.','icono'=>'glyphicon glyphicon-user','ruta'=>'/usuarios','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('module_id'=>1,'nombre'=>'Roles','descripcion'=>'Permite consulta, ingreso, modificación y desactivación de roles.','icono'=>'glyphicon glyphicon-user','ruta'=>'/roles','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('module_id'=>1,'nombre'=>'Permisos','descripcion'=>'Permite consulta, ingreso, modificación y desactivación de permisos.','icono'=>'glyphicon glyphicon-user','ruta'=>'/permisos','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('module_id'=>1,'nombre'=>'Catálogos','descripcion'=>'Permite consulta, ingreso, modificación y desactivación de los catálogos del sistema.','icono'=>'glyphicon glyphicon-user','ruta'=>'/usuarios','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						
						array('module_id'=>2,'nombre'=>'Ingresar persona','descripcion'=>'Permite la toma de datos para una persona que no existe en el sistema','icono'=>'glyphicon glyphicon-user','ruta'=>'/usuarios','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('module_id'=>2,'nombre'=>'Editar persona','descripcion'=>'Permite la modificación de datos para una persona que ya existe en el sistema','icono'=>'glyphicon glyphicon-user','ruta'=>'/usuarios','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring())
					);
		DB::table('forms')->insert($data);
    }
}
