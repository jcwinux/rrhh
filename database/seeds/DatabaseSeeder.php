<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call(DocumentTypesTableSeeder::class);
		$this->call(CatalogTypesTableSeeder::class);
		$this->call(CatalogsTableSeeder::class);
		$this->call(ProvincesTableSeeder::class);
		$this->call(CitiesTableSeeder::class);
		$this->call(TownsTableSeeder::class);
		$this->call(PeopleTableSeeder::class);
    }
}
