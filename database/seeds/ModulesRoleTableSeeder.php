<?php

use Illuminate\Database\Seeder;

class ModulesRoleTableSeeder extends Seeder
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
						array('role_id'=>1,'module_id'=>1,'created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('role_id'=>1,'module_id'=>2,'created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('role_id'=>1,'module_id'=>3,'created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('role_id'=>1,'module_id'=>4,'created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('role_id'=>1,'module_id'=>5,'created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring()),
						array('role_id'=>1,'module_id'=>6,'created_at'=>Carbon\Carbon::now()->todatetimestring(),'updated_at'=>Carbon\Carbon::now()->todatetimestring())
					);
		DB::table('modules_roles')->insert($data);
    }
}
