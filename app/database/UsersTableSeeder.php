<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		User::truncate();

		foreach(range(1, 30) as $index)
		{
			User::create([
				'username' => str_replace('.', '_', $faker->unique()->userName),  
                'email' => $faker->email,  
                'password' => 'password',  
                'confirmation' => str_random(64),  
                'confirmed' => true  
			]);
		}
	}

}