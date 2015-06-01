<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
	 	DB::statement('SET FOREIGN_KEY_CHECKS=0;');

	//	$this->call('LogistikTableSeeder');
	//	$this->command->info('Database seeded!');

		$this->call('BooksTableSeeder');
		$this->call('AuthorsTableSeeder');
		$this->call('SentryTableSeeder');
		$this->command->info('database berhasil di-Seed');

//		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
