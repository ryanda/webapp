<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class LogistikTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

/*
		SPelanggan::truncate();

		foreach(range(1, 100) as $index)
		{
			SPelanggan::create([
				'nama' => $faker->name,
				'alamat' => $faker->address,
        		'telp' => $faker->numerify('08##-####-####'),
				'kota' => $faker->state
			]);
		}

		SBarang::truncate();

		foreach(range(1, 100) as $index)
		{
			SBarang::create([
				'id_plg' => $faker->unique()->numberBetween($min = 1, $max = 100),
				'jenis' => $faker->randomElement($array = array('Biasa','Kilat')),
				'berat' => $faker->numberBetween($min = 1, $max = 50),
        'biaya' => $faker->numberBetween($min = 50000, $max = 200000),
				'ket' => $faker->text($maxNbChars = 100)
			]);
		}
*/

		SPenerima::truncate();

		foreach(range(1, 100) as $index)
		{
			SPenerima::create([
				'id_brg' => $faker->unique()->numberBetween($min = 1, $max = 100),
				'nama' => $faker->name,
				'telp' => $faker->numerify('08##-####-####'),
        		'alamat' => $faker->address,
        		'kota' => $faker->state
			]);
		}

/*
		SLacak::truncate();

		foreach(range(1, 100) as $index)
		{
			SLacak::create([
				'id_brg' => $faker->unique()->numberBetween($min = 1, $max = 100),
				'tgl_kirim' => $faker->dateTimeThisMonth($max='2014-12-12 04:22:23'),
				'tgl_tiba' => $faker->dateTimeThisMonth($max='now')
			]);
		}
*/
/*
		SAdmin::truncate();

		foreach(range(1, 10) as $index)
		{
			SAdmin::create([
				'id' => $faker->bothify('??###'),
				'nama' => $faker->name,
				'alamat' => $faker->address,
				'telp' => $faker->numerify('08##-####-####')
			]);
		}

		SSuratJalan::truncate();

		foreach(range(1, 5) as $index)
		{
			SSuratJalan::create([
				'id' => $faker->unique()->numberBetween($min = '2131101', $max = '2131105'),
				'id_mbl' => $faker->unique()->randomElement($array = array('B 5680 DS','B 123 A', 'B 7896 AD', 'F 2131 ER', 'A 212 JA')),
				'kotatujuan' => $faker->unique()->state,
				'tgl_jalan' => $faker->dateTimeThisMonth($max='2014-12-12 04:22:23'),
				'tgl_tiba' => $faker->dateTimeThisMonth($max='now'),
				'id_adm' => $faker->unique()->numberBetween($min = '1', $max = '10')
      ]);
		}
*/

/*
		SSupir::truncate();

		foreach(range(1, 9) as $index)
		{
			SSupir::create([
				'id' => $faker->unique()->numerify('123#'),
				'nama' => $faker->name,
				'telp' => $faker->numerify('08##-####-####')
			]);
		}
*/
/*
		SMobil::truncate();

		foreach(range(1, 5) as $index)
		{
			SMobil::create([
				'id' => $faker->unique()->randomElement($array = array('B 5680 DS','B 123 A', 'B 7896 AD', 'F 2131 ER', 'A 212 JA')),
				'status' => $faker->randomElement($array=array('tersedia')),
				'id_spr' => $faker->unique()->numerify('123#'),
			]);
		}

		SDaftarBarang::truncate();

		foreach(range(1, 25) as $index)
		{
			SDaftarBarang::create([
				'id_jln' => $faker->numberBetween($min = '2131101', $max = '2131105'),
				'id_brg' => $faker->unique()->numberBetween($min = 1, $max = 100),
			]);
		}
*/

	}

}
