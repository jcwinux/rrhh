<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');
		for ($i=0;$i<100;$i++)
			$data[] = array ('id_document_type'=>$faker->numberBetween(1,2),
							 'num_identificacion'=>$faker->dni,
							 'nombre_1'=>$faker->firstName,
							 'apellido_1'=>$faker->lastName,
							 'fecha_ncto'=>$faker->dateTimeThisCentury->format('Y-m-d'),
							 'trato'=>$faker->title,
							 'sexo'=>$faker->numberBetween(1,0),
							 'discapacidad'=>$faker->numberBetween(1,0),
							 //'grupo_sanguineo'=>'',
							 'email_institucional'=>$faker->email,
							 'email_personal'=>$faker->email,
							 'telefono_convencional'=>$faker->phoneNumber,
							 'telefono_celular'=>$faker->phoneNumber,
							 'ciudad_residencia'=>$faker->city,
							 'calle_principal'=>$faker->streetName,
							 'calle_transversal'=>$faker->streetName,
							 'manzana'=>$faker->numberBetween(1,1000),
							 'villa'=>$faker->buildingNumber,
							 'username'=>$faker->userName,
							 'password'=>bcrypt($faker->userName),
							 'created_at'=>Carbon\Carbon::now()->todatetimestring(),
							 'updated_at'=>Carbon\Carbon::now()->todatetimestring());
							 
		DB::table('People')->insert($data);
    }
}