<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
						array('role_id'=>1,'nombre'=>'Administrador','apellido'=>'Sistema','correo'=>'admin@e-mail.com','username'=>'admin','password'=>bcrypt('admin'),'created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring())
					);
		DB::table('users')->insert($data);
    }
}
