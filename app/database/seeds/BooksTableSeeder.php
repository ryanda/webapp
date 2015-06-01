<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder {

	public function run()
	{
		DB::table('books')->delete();

		$books = [
			['title' => 'Kupinang Engkau dengan Hamdalah', 'author_id' => 1, 'amount' => 3],
			['title' => 'Jalan Cinta Para Pejuang', 'author_id' => 4, 'amount' => 2],
			['title' => 'Membingkai Surga dalam Rumah Tangga', 'author_id' => 3, 'amount' => 4],
			['title' => 'Cinta Rumah Tangga Muslim', 'author_id' => 3, 'amount' => 3]
		];

		DB::table('books')->insert($books);
	}

}