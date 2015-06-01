/* class TripTableSeeder extends Seeder 
{

    public function run()  
    {

        $faker = Faker\Factory::create();

        Trip::truncate();

        foreach(range(1,10) as $index)  
        {  
            Trip::create([  
                'user_id' => rand(1,30),  
                'location' => $faker->city . ', ' . $faker->country,  
                'from' => $from = $faker->dateTimeBetween('+1 days', '+2 years')->format('m/d/Y'),  
                'to' => $faker->dateTimeBetween($from, $from . ' +3 months')->format('m/d/Y'),  
                'note' => $faker->paragraph(1)  
								'nama' => str_replace('.', '_', $faker->unique()->name),  
                'alamat' => $faker->streetAddress,
				'telp' => $faker->phoneNumber,
				'kota' => $faker->state






<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

    public function run()
    {    
        User::create([
            'first_name' => 'First',
            'last_name' => 'Last',
            'username' => 'myusername',
            'email_address' => 'myemail@gmail.com',
            'avatar' => 'Myava',
            'password' => Hash::make('changeme'),
            'role_id' => 4,
            'status_id' => 1
        ]);

        //create instanances for each fake user
        $faker = Faker::create();

        $roleIds = UserRole::lists('id');
        $statusIds = UserStatus::lists('id');

        foreach(range(1, 20) as $index)
        {
            User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'username' => $faker->username,
                'email_address' => $faker->freeEmail,
                'avatar' => $faker->lexify('????????'),
                'password' => Hash::make($faker->word),
                'role_id' => $faker->randomElement($roleIds),
                'status_id' => $faker->randomElement($statusIds)
            ]);
        }
    }

}


            ]);  
        }  
    }  
}  */