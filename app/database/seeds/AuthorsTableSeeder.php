<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AuthorsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('authors')->delete();

		$authors = [
			['name' => 'Muhammad Ryanda Putra'],
			['name' => 'Siti Aisyah Velianda'],
		];

		DB::table('authors')->insert($authors);
	}

}