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
			array('module_id'=>1,'nombre'=>'Usuarios','descripcion'=>'Permite consulta, ingreso, modificación y desactivación de usuarios.','icono'=>'fa fa-users','ruta'=>'/usuarios','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('module_id'=>1,'nombre'=>'Roles','descripcion'=>'Permite consulta, ingreso, modificación y desactivación de roles.','icono'=>'fa fa-sitemap','ruta'=>'/roles','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('module_id'=>1,'nombre'=>'Permisos','descripcion'=>'Permite consulta, ingreso, modificación y desactivación de permisos.','icono'=>'fa fa-key','ruta'=>'/permisos','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('module_id'=>1,'nombre'=>'Catálogos','descripcion'=>'Permite consulta, ingreso, modificación y desactivación de los catálogos del sistema.','icono'=>'fa fa-folder','ruta'=>'/catalogo','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			
			array('module_id'=>3,'nombre'=>'Ingresar persona','descripcion'=>'Permite la toma de datos para una persona que no existe en el sistema','icono'=>'glyphicon glyphicon-user','ruta'=>'/persona','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			array('module_id'=>3,'nombre'=>'Editar persona','descripcion'=>'Permite la modificación de datos para una persona que ya existe en el sistema','icono'=>'glyphicon glyphicon-user','ruta'=>'/persona_search','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			
			array('module_id'=>1,'nombre'=>'Departamento','descripcion'=>'Permite consulta, ingreso, modificación y desactivación de los departamentos de la empresa.','icono'=>'fa fa-building','ruta'=>'/departamentos','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			
			array('module_id'=>3,'nombre'=>'Centros de costo','descripcion'=>'Permite consulta, ingreso, modificación y desactivación de las centros de costo.','icono'=>'glyphicon glyphicon-barcode','ruta'=>'/centros_costos','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			
			array('module_id'=>3,'nombre'=>'Cargos','descripcion'=>'Permite consulta, ingreso, modificación y desactivación de los cargos.','icono'=>'fa fa-suitcase','ruta'=>'/cargos','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			
			array('module_id'=>3,'nombre'=>'Tipos de contrato','descripcion'=>'Permite la consulta, modificación y desactivación de los tipos de contratos que maneja el sistema.','icono'=>'fa fa-file-text-o','ruta'=>'/tipos_contrato','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
			
			array('module_id'=>3,'nombre'=>'Contratación','descripcion'=>'Permite la contratación de una persona para convertirse en empleado.','icono'=>'fa fa-thumbs-up','ruta'=>'/contratar','created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring())
		);
		DB::table('forms')->insert($data);
    }
}
