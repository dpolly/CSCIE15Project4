<?php
/**
 * 12-13-2014 DMP: Added call to PlantDBSeeder
 */

/**
 * Class DatabaseSeeder
 */

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
        $this->call('PlantDBSeeder');
	}

}
